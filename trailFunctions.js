
var locationNames = ["Independence", "Kansas River", "Big Blue River", "Fort Kearney", "Chimney Rock", "Fort Laramie", "Independence Rock", "South Pass", "Green River Crossing", "Fort Bridger", "Soda Springs", "Fort Hall", "Snake River Crossing", "Fort Boise", "Blue Mountains", "Fort Walla Walla", "The Dalles", "The Willamette Valley", "Error"];
var travelDistances = [102, 82, 118, 250, 86, 190, 102, 57, 125, 143, 162, 57, 182, 113, 160, 55, 100, 0, 404];
var locationType = ["fort", "river", "river", "fort", "landmark", "fort", "landmark", "landmark", "river", "fort", "landmark", "fort", "river", "fort", "landmark", "fort", "landmark", "end", "Error"];
var danger = [0, 0, 1, 1, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 5, 5, 5, 666];

//there is an inverse relationship between this variable and the amount of food and water, the larger the variable, the worse it is
var foodAndWater = 0;

var date_obj = new Date(year, month, day);

//Step forward on the trail, updates distances, checks random events, updates stats and equipment
function continueTrail(){
	partySize = parseInt(partySize);
	broken = parseInt(broken);
	//if the wagon is not broken
	if (broken == 0){
		locale = parseInt(locale);
		//get the next mile number and update distance info
		//move very slowly if you have no oxen
		if (oxen <= 0){
			milesToNext -= 5;
			milesTraveled = parseInt(milesTraveled) + 5;
		}
		else {
			milesToNext -= (paceVal * (Math.floor(oxen / 3))) + 10;
			milesTraveled = parseInt(milesTraveled) + (paceVal * (Math.floor(oxen / 3))) + 10;
		}
		if (milesToNext < 0) {
			milesTraveled = parseInt(milesTraveled) + parseInt(milesToNext);
			milesToNext = 0;
		}	

		update_date();

		food -= partySize * rationsVal;

		updateHealth(false);
		updateWeather();
		randomEvent();

		if (food < 0){
			food = 0;
		}

		update_location();
		
		update_display();

	}
	//if wagon is broken try to fix but force spare part usage
	else{
		fix_wagon(false);
	}
}

//update the locale variable and tell the player where they are. split trail when necessary
function update_location(){
	//if at new destination
	if (milesToNext == 0){
		//these locations are part of splits
		var gr_mod = 0;
		var locale_mod = 1;
		if (locationNames[locale] == "Green River Crossing"){
			console.log("at GRC");
			locale_mod += 1;
			gr_mod = 0;
		}

		//get new info
		milesToNext = travelDistances[locale];
		locale += locale_mod;


		//if the player reached a river, force them to cross it
		if (locationType[locale-locale_mod-gr_mod] == "river"){
			river_modal();
		}
		//if the player reached a fort, give them the option to go to it
		else if (locationType[locale-locale_mod-gr_mod] == "fort"){
			inFort = true;
			fort_modal();
		}
		else if (locationType[locale-locale_mod] == "landmark"){
			landmark_modal();
		}
		//check for split path, these happen at south pass and the blue mountains
		if (locationNames[locale-locale_mod] == "South Pass" || locationNames[locale-locale_mod] == "Blue Mountains"){
			split_trail(locationNames[locale], locationNames[locale+1]);
		}
		else if (locationNames[locale-locale_mod] != "The Willamette Valley"){
			alert_window("From " + locationNames[locale - locale_mod] + ", it is " + milesToNext + " miles to " + locationNames[locale]);
		}

		if (locationNames[locale-locale_mod] == "The Dalles"){
			end_game_choice("You are reaching the end of your journey, just one final choice to make...");
		}
		if (locationNames[locale-locale_mod] == "The Willamette Valley"){
			game_win();
		}
	}
	if (partySize == 0){
		game_over();
	}
}

function update_split(modifier){
	//if there is a jump
	if (modifier == 1){
		locale += modifier;
		milesToNext = travelDistances[locale];
		split = 1;
	}
	else 
		split = 0;

	alert_window("From " + locationNames[locale - 1 - modifier] + ", it is " + milesToNext + " miles to " + locationNames[locale]);
	update_display();
}

function randomEvent(){
	var blizzard = false;
	var blizzardMod = 0;
	var random = randomNumber(1, 100);
	if (weather == "snowy"){
		blizzardMod = 75;
	}
	else if (weather == "very cold"){
		blizzardMod = 50;
	}
	//prioritize blizzard
	if (random <= blizzardMod){
		alert_window("severe blizzard lose a day");
		update_date();
		food -= partySize * rationsVal;
		updateHealth(false);
		updateWeather();
		blizzard = true;
	}

	//pick an event
	var role_event = randomNumber(1, 6);
	if (!blizzard){
		switch (role_event){
			//disease
			case 1:
				for (var i = 0; i < 5; i++){
					if (disease[i] == "none"){
						disease[i] = getDisease();
						if (disease[i] != "none"){
							stats[i] = 5;
							alert_window(party[i] + " has " + disease[i]);
							break;
						}
					}
				}	
				break;	
			//impassable trail
			case 2:
				if (random <= 3 + danger[locale]){
					var daysLost = randomNumber(1, 9);
					alert_window("impassable trail lose " + daysLost + " days");
					for (var i = 0; i < daysLost; i++){
						update_date();
						food -= partySize * rationsVal;
						updateHealth(false);
						updateWeather();
					}
				}
				break;
			//stolen goods
			case 3:
				if (random <= 3 + danger[locale]){
					var bait_lost = randomNumber(10, 100);
					var clothes_lost = randomNumber(1, 10);
					var food_lost = randomNumber(5, 50);
					var money_lost = randomNumber(20, 150);
					bait -= bait_lost;
					if (bait < 0){
						bait_lost = bait_lost + bait;
						bait = 0;
					}
					clothing -= clothes_lost;
					if (clothing < 0){
						clothes_lost = clothes_lost + clothing;
						clothing = 0;
					}
					food -= food_lost;
					if (food < 0){
						food_lost = food_lost + food;
						food = 0;
					}
					money -= money_lost;
					if (money < 0){
						money_lost = money_lost + money;
						money = 0;
					}
					alert_window("You were robbed! You lost: \n" + bait_lost + " bait\n" + clothes_lost + " pairs of clothes\n" + food_lost + " Lbs. of food, and " + "$" + money_lost);
				}
				break;
			//friendly locals
			case 4:
				if (random <= 3 + danger[locale]){
					food += 50;
					alert_window("Some friendly locals help you forage for food!");
				}
				break;
			//broken part
			case 5:
				if (random <= 3 + danger[locale]){
					var parts = ["error", "wheel", "axle", "tongue"];
					var broken_part = randomNumber(1, 3);
					broken = broken_part;
					broken_wagon_1("A " + parts[broken_part] + " has broken on the wagon, would you like to fix it?");
				}
				break;
			//dead oxen
			case 6:
				if (random <= 3 + danger[locale]){
					alert_window("One of your oxen has died");
					oxen -= 1;
					if (oxen < 0)
						oxen = 0;
				}
				break;
			//increase hazard for oxen
			case 7:
				if (random <= (danger[locale] + foodAndWater + danger[locale])){
					alert_window("There is little food or water in this area");
					foodAndWater += 1;
				}
			default:
				alert_window("bad roll");

		}
	}
}

function getDisease(){
	//diseases
	var diseases = ["the measles", "a snakebite", "dysentery", "typhoid", "cholera", "exaustion", "a broken leg"];
	var num = randomNumber(1, 100);
	if (num <= 3 + danger[locale]){
		return diseases[randomNumber(0, 6)];
	}
	else {
		return "none";
	}
}

function updateHealth(resting){
	var restingBonus = 15;
	var statuses = ["dead", "very poor", "very poor", "poor", "poor", "fair", "fair", "fair", "fair", "good", "good"];
	//weather types: very cold, cold, cool, good, warm, hot, very hot, rainy, very rainy, snowy
	//party health is influenced by the weather, rations, pace, if they are resting or not, and the strain of treveling for a long time
	var weatherMod = [-25, -15, -5, 0, -5, -15, -25, -15, -20, -20];
	var rationMod = [0, -15, -5, 0];
	var paceMods = [0, -10, -15, -20];
	var paceMod = 0;
	var foodMod = 0;

	if (!resting){
		paceMod = paceMods[paceVal];
		restingBonus = 0;
	}
	if (food <= 0){
		foodMod = -30;
	}

	var chanceOfRecovery = 100;

	for (var i = 0; i < 5; i++) {
		//only if not dead
		if (disease[i] != "dead") {
			if (disease[i] != "none"){
				//party members will have a greater chance of losing health if they are sick
				chanceOfRecovery = 75 + weatherMod[weatherCode] + rationMod[rationsVal] + paceMod + foodMod + restingBonus - danger[locale];
			} 
			else {
				chanceOfRecovery = 100 + weatherMod[weatherCode] + rationMod[rationsVal] + paceMod + foodMod + restingBonus - danger[locale];
			}
			var chance = randomNumber(1, 100);
			if (chance <= chanceOfRecovery){
				stats[i] += 1;
			}
			else {
				stats[i] -= 1;
			}
			//max 10 health
			if (stats[i] > 10){
				stats[i] = 10;
			}
			//min 0 health
			if (stats[i] < 0){
				stats[i] = 0;
			}
			//check for death
			if (stats[i] <= 0){
				var died_of = disease[i];
				if (died_of == "none")
					died_of = "natural causes";
				alert_window(party[i] + " has died of " + died_of);
				disease[i] = "dead";
				partySize -= 1;
				if (partySize == 0){
					alert_window("Everyone is dead!");
				}
			}
			//if a sick person recovers
			if (stats[i] == 10 && disease[i] != "none") {
				console.log("recovered");
				alert_window(party[i] + " has recovered!");
				disease[i] = "none";
			}
		}
	}
	//average health
	var totalHealth = stats[0] + stats[1] + stats[2] + stats[3] + stats[4];
	totalHealth = Math.floor(totalHealth / 5);
	health = statuses[totalHealth];
}

function updateWeather(){
	// weather codes: very cold => 0, cold => 1, cool => 2, good => 3, warm => 4, hot => 5, very hot => 6, rainy => 7, very rainy => 8, snowy => 9
	var weatherTypes = ["very cold", "cold", "cool", "good", "warm", "hot", "very hot", "rainy", "very rainy", "snowy"];
	var weatherCodes = [[0, 0, 0, 0, 0, 0, 1, 9, 9, 9], [0, 0, 0, 0, 0, 1, 1, 1, 9, 9], [1, 1, 1, 1, 2, 2, 2, 3, 3, 4], [1, 1, 2, 2, 3, 3, 4, 7, 7, 8], [1, 1, 3, 3, 3, 3, 4, 4, 7, 7], [2, 3, 3, 4, 4, 4, 5, 5, 5, 7], [3, 3, 4, 4, 4, 4, 5, 5, 6, 7], [3, 4, 4, 4, 5, 5, 5, 6, 6, 6], [2, 2, 3, 3, 4, 4, 5, 5, 7], [1, 2, 2, 2, 3, 3, 3, 4, 7, 7], [0, 1, 1, 1, 1, 1, 2, 3, 7, 7], [0, 0, 0, 0, 1, 1, 1, 1, 9, 9]];
	weatherCode = weatherCodes[date_obj.getMonth()][randomNumber(0, 9)];
	weather = weatherTypes[weatherCode];
}

function open_trade(){
	//trading takes a day
	update_date();
	updateHealth(false);
	updateWeather();
	food -= partySize * rationsVal;
	var items = ["Oxen", "Food", "Clothing", "Bait", "Wheel", "Axle", "Tongue"];
	//what you give
	var trade_to = randomNumber(0, 6);
	//what you get
	var trade_for = randomNumber(0, 6);
	while (trade_to == trade_for) {
		trade_for = randomNumber(0, 6);
	}
	switch (trade_to) {
		case 0:
			var quantity_to = 1;
			var you_have = oxen;
			break;
		case 1:
			var quantity_to = randomNumber(20, 100);
			var you_have = food;
			break;
		case 2:
			var quantity_to = randomNumber(2, 10);
			var you_have = clothing;
			break;
		case 3:
			var quantity_to = randomNumber(10, 30);
			var you_have = bait;
			break;
		case 4:
			var quantity_to = 1;
			var you_have = wheels;
			break;
		case 5:
			var quantity_to = 1;
			var you_have = axles;
			break;
		case 6:
			var quantity_to = 1;
			var you_have = tongues;
			break;
		default:
			var quantity_to = "Bad num";
	}
	switch (trade_for) {
		case 0:
			var quantity_for = 1;
			break;
		case 1:
			var quantity_for = randomNumber(20, 100);
			break;
		case 2:
			var quantity_for = randomNumber(2, 10);
			break;
		case 3:
			var quantity_for = randomNumber(10, 30);
			break;
		case 4:
			var quantity_for = 1;
			break;
		case 5:
			var quantity_for = 1;
			break;
		case 6:
			var quantity_for = 1;
			break;
		default:
			var quantity_to = "Bad num";
	}
	update_display();
	$("#q_for").val(quantity_for);
	$("#i_for").val(trade_for);
	$("#q_to").val(quantity_to);
	$("#i_to").val(trade_to);
	var trade_string = "You meet a man who wants to trade with you, he offers you " + quantity_for + " " + items[trade_for] + " for " + quantity_to + " " + items[trade_to] + ". You have " + you_have;
	trade_window(trade_string);
}


function close_trade(){
	var quantity_for = parseInt($("#q_for").val());
	var trade_for = parseInt($("#i_for").val());
	var quantity_to = parseInt($("#q_to").val());
	var trade_to = parseInt($("#i_to").val());

	var can_trade = false;

	switch (trade_to) {
		case 0:
			if (quantity_to > oxen)
				alert_window("You do not have enough oxen to complete this trade");
			else {
				oxen -= quantity_to;
				can_trade = true;
			}
			break;
		case 1:
			if (quantity_to > food)
				alert_window("You do not have enough food to complete this trade");
			else {
				food -= quantity_to;
				can_trade = true;
			}
			break;
		case 2:
			if (quantity_to > clothing)
				alert_window("You do not have enough pairs of clothes to complete this trade");
			else {
				clothing -= quantity_to;
				can_trade = true;
			}
			break;
		case 3:
			if (quantity_to > bait)
				alert_window("You do not have enough bait to complete this trade");
			else {
				bait -= quantity_to;
				can_trade = true;
			}
			break;
		case 4:
			if (quantity_to > wheels)
				alert_window("You do not have enough wheels to complete this trade");
			else {
				wheels -= quantity_to;
				can_trade = true;
			}
			break;
		case 5:
			if (quantity_to > axles)
				alert_window("You do not have enough axles to complete this trade");
			else {
				axles -= quantity_to;
				can_trade = true;
			}
			break;
		case 6:
			if (quantity_to > tongues)
				alert_window("You do not have enough tongues to complete this trade");
			else {
				tongues -= quantity_to;
				can_trade = true;
			}
			break;
		default:
			alert_window("bad trade_to value");
	}
	if (can_trade){
		switch (trade_for) {
			case 0:
				oxen = parseInt(oxen) + quantity_for;
				break;
			case 1:
				food = parseInt(food) + quantity_for;
				break;
			case 2:
				clothing = parseInt(clothing) + quantity_for;
				break;
			case 3:
				bait = parseInt(bait) + quantity_for;
				break;
			case 4:
				wheels = parseInt(wheels) + quantity_for;
				break;
			case 5:
				axles = parseInt(axles) + quantity_for;
				break;
			case 6:
				tongues = parseInt(tongues) + quantity_for;
				break;
			default:
				alert_window("bad trade_for value");
		}
	}
	update_display();
}

function fix_wagon(by_hand){
	var random = randomNumber(1, 100);
	var modifier = 0;
	//if you can fix without using a part
	if (by_hand = true)
		modifier = 50;
	//50/50 chance of fixing the wagon
	if (random < modifier){
		broken = 0;
		alert_window("You managed to fix the wagon!");
	}
	else {
		switch (broken){
			case 1:
				if (wheels > 0){
					wheels -= 1;
					broken = 0;
					alert_window("You cannot fix the wheel, so you must use a replacement part.");
				}
				else {
					broken_wagon_2();
				}
				break;
			case 2:
				if (axles > 0){
					axles -= 1;
					broken = 0;
					alert_window("You cannot fix the axle, so you must use a replacement part.");
				}
				else {
					broken_wagon_2();
				}
				break;
			case 3:
				if (tongues > 0){
					tongues -= 1;
					broken = 0;
					alert_window("You cannot fix the tongue, so you must use a replacement part.");
				}
				else {
					broken_wagon_2();
				}
				break;
			default:
				alert_window("bad part");
		}
	}
}

//random number generator
function randomNumber(min, max){
	return Math.floor(Math.random() * (max - min)) + min;
}

function game_over(){
	$("#game_over_modal").css("visibility", "visible");
	$("#game_over_modal").dialog({
		closeOnEscape: false,
		open: function(event, ui){
			$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		},
		modal: true,
		buttons: [
		{
			text: "End Game",
			click: function(){
				$(this).dialog("close");
				$("#game_over_button").trigger("click");
			}
		}
		]
	});
	var image_source = "images/skull.jpg";
	$("#skull").attr("src", image_source);
	$("#skull").css("visibility", "visible");
	$("#skull").css("width", "250px");
	$("#skull").css("height", "250px");
}

function river_modal(){
	$("#river_modal").css("visibility", "visible");
	$("#river_modal").dialog({
		closeOnEscape: false,
		open: function(event, ui){
			$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		},
		modal: true,
		buttons: [
		{
			text: "Cross the river",
			click: function(){
				$(this).dialog("close");
				$("#river_button").trigger("click");
			}
		}
		]
	});
	var image_source = "images/" + locationNames[locale-1] + ".jpg";
	$("#river_modal").dialog('option', 'title', locationNames[locale-1]);
	$("#river_image").attr("src", image_source);
	$("#river_image").css("visibility", "visible");
	$("#river_image").css("width", "275px");
	$("#river_image").css("height", "200px");
}



function fort_modal(){
	$("#fort_modal").css("visibility", "visible");
	$("#fort_modal").dialog({
		modal: true,
		buttons: [
			{
				text: "Go to town",
				click: function(){
					$(this).dialog("close");
					$("#fort_button").trigger("click");
				}
			},
			{
				text: "Close",
				click: function() {
					$(this).dialog("close");
				}
			}
		]
	});
	var image_source = "images/" + locationNames[locale-1] + ".jpg";
	$("#fort_modal").dialog('option', 'title', locationNames[locale-1]);
	$("#fort_image").attr("src", image_source);
	$("#fort_image").css("visibility", "visible");
	$("#fort_image").css("width", "275px");
	$("#fort_image").css("height", "250px");
}

function landmark_modal(){
	$("#landmark_modal").css("visibility", "visible");
	$("#landmark_modal").dialog({
		modal: true,
		buttons: [
			{
				text: "Close",
				click: function() {
					$(this).dialog("close");
				}
			}
		]
	});
	var image_source = "images/" + locationNames[locale-1] + ".jpg";
	$("#landmark_modal").dialog('option', 'title', locationNames[locale-1]);
	$("#landmark_image").attr("src", image_source);
	$("#landmark_image").css("visibility", "visible");
	$("#landmark_image").css("width", "275px");
	$("#landmark_image").css("height", "250px");
}

function alert_window(text) {
	$("#alert").css("visibility", "visible");
	$("#alert").dialog({
		modal: true,
		buttons: [
			{
				text: "Close",
				click: function(){
					$(this).dialog("close");
				}
			}
		]
	});
	$("#alert_text").text(text);
}

function split_trail(location_1, location_2) {
	$("#split_trail").css("visibility", "visible");
	$("#split_trail").dialog({
		closeOnEscape: false,
		open: function(event, ui){
			$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		},
		modal: true,
		buttons: [
			{
				text: location_1,
				click: function(){
					$(this).dialog("close");
					//update_location(0);
					update_split(0);
				}
			},
			{
				text: location_2,
				click: function(){
					$(this).dialog("close");
					//update_location(1);
					update_split(1);
				}
			}
		]
	});
	$("#split_trail_text").text("The trail splits here, would you like to go to " + location_1 + " or " + location_2 + "?");
}

function trade_window(text) {
	$("#tradeBox").css("visibility","visible");
	$("#tradeBox").dialog({

		modal: true,
		buttons: [
		{
			text: "Trade",
			click: function() {
				// trade items with whoever
				$( this ).dialog( "close" );
				close_trade();
				}

		},
		{
			text: "Walk Away",
			click: function() {
				$( this ).dialog( "close" );
				}
		}
		]
	});
	$("#trade_string").text(text);
}

function broken_wagon_1(text){
	$("#broken_wagon_1").css("visibility", "visible");
	$("#broken_wagon_1").dialog({
		closeOnEscape: false,
		open: function(event, ui){
			$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		},
		modal: true,
		buttons: [
		{
			text: "Fix",
			click: function() {
				$( this ).dialog( "close" );
				fix_wagon(true);
				}
		}
		]
	});
	$("#broken_wagon_text_1").text(text);
}

function broken_wagon_2(){
	$("#broken_wagon_2").css("visibility", "visible");
	$("#broken_wagon_2").dialog({
		modal: true,
		buttons: [
		{
			text: "trade",
			click: function(){
				$( this ).dialog( "close" );
				open_trade();
				}
		}
		]
	});
	$("#broken_wagon_text_2").text("You must trade for a part to fix the wagon.");
}

function wait(){
	console.log("waiting");
	date_obj = new Date(year, month, day);
	$("#waitBox").css("visibility","visible");
	$("#waitBox").dialog({
		modal: true,
		buttons: [
		{
			text: "Wait",
			click: function() {
				// make time pass, heal people, and the such
				for (var i = 0; i < $("#waiting").val(); i++){
					
					// ask how update Health works???
					update_date();
					food -= partySize * rationsVal;
					updateHealth(true);
					
				}
				//update weather
				if ($("#waiting").val() > 0){
					updateWeather();
				var num = randomNumber(1, 100);
				var change = parseFloat((Math.random() * (0.4 - 0.1) + 0.1).toFixed(1));
				if (num <= 75){
					riverDepth -= change;
				}
				else {
					riverDepth += change;
				}
				}
				$( this ).dialog( "close" );
				}
		}
		]
	});
}

function rest(){
	$("#restBox").css("visibility","visible");
	$("#restBox").dialog({
		modal: true,
		buttons: [
		{
			text: "Wait",
			click: function() {
				// make time pass, heal people, and the such
				for (var i = 0; i < $("#waiting").val(); i++){
					
					// ask how update Health works???
					update_date();
					food -= partySize * rationsVal;
					updateHealth(true);

				}
				if ($("#waiting").val() > 0)
					updateWeather();
				
				update_display();
				$( this ).dialog( "close" );
				}
		}
		]
	});
}	

function end_game_choice(text){
	$("#end_game").css("visibility", "visible");
	$("#end_game").dialog({
		closeOnEscape: false,
		open: function(event, ui){
			$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		},
		modal: true,
		buttons: [
		{
			text: "Take the Barlow Toll Road",
			click: function() {
				$( this ).dialog( "close" );
				take_toll_road();
				}
		},
		{
			text: "Go down the Columbia River",
			click: function(){
				$( this ).dialog( "close" );
				$("#take_river_button").trigger("click");
			}
		}
		]
	});
	$("#end_game_text").text(text);
}

function game_win(){
	$("#game_win").css("visibility", "visible");
	$("#game_win").dialog({
		closeOnEscape: false,
		open: function(event, ui){
			$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		},
		modal: true,
		buttons: [
		{
			text: "The End",
			click: function(){
				$(this).dialog("close");
				$("#game_win_button").trigger("click");
			}
		}
		]
	});
	var image_source = "images/Willamette Valley.jpg";
	$("#valley").attr("src", image_source);
	$("#valley").css("visibility", "visible");
	$("#valley").css("width", "275px");
	$("#valley").css("height", "200px");
}

function take_toll_road(){
	if (money > 13){
		money -= 13;
	}
	else 
		end_game_choice("You do not have enough money to take the toll road.");
}

function update_display(){
	var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	$("#date").text(months[date_obj.getMonth()] + " " + date_obj.getDate() + " " + date_obj.getFullYear());
    $("#weather").text(weather);
    $("#health").text(health);
    $("#food").text(food);
    $("#next").text(milesToNext);
    $("#traveled").text(milesTraveled);
    $("#pace").text(pace);
    $("#rations").text(rations);
}

function update_date(){
	/*if (typeof date_obj == 'undefined'){
		console.log("undefined reloading");
		location.reload();
	}*/
	date_obj = new Date(year, month, day);
	date_obj.setDate(date_obj.getDate() + 1);
	day = date_obj.getDate();
	month = date_obj.getMonth();
	year = date_obj.getFullYear();
}

function ferryDate(time) {
	// make time pass, heal people, and the such
	for (var i = 0; i < time; i++){
	// ask how update Health works???
		update_date();
		food -= partySize * rationsVal;
		updateHealth(true);
	}
	updateWeather();
}