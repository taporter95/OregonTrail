	
var locationNames = ["Independence", "Kansas River", "Big Blue River", "Fort Kearney", "Chimney Rock", "Fort Laramie", "Independence Rock", "South Pass", "Green River Crossing", "Fort Bridger", "Soda Springs", "Fort Hall", "Snake River Crossing", "Fort Boise", "Blue Mountains", "Fort Walla Walla"];
var travelDistances = [102, 82, 118, 250, 86, 190, 102, 57, 125, 143, 162, 57, 182, 113, 160, 55];
var locationType = ["fort", "river", "river", "fort", "landmark", "fort", "landmark", "landmark", "river", "fort", "landmark", "fort", "river", "fort", "landmark", "fort"];
var foodAndWater = [0, 0, 1, 1, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 5];

var date_obj = new Date(year, month, day);

function continueTrail(){
	locale = parseInt(locale);
	milesToNext -= (paceVal * (Math.floor(oxen / 3))) + 10;
	milesTraveled = parseInt(milesTraveled) + (paceVal * (Math.floor(oxen / 3))) + 10;
	if (milesToNext < 0) {
		milesTraveled = parseInt(milesTraveled) + parseInt(milesToNext);
		milesToNext = 0;
	}	

	update_date();

	food -= partySize * rationsVal;
	console.log(date_obj.getMonth() + " " + date_obj.getDay() + " " + date_obj.getFullYear());

	updateHealth(false);
	updateWeather();
	randomEvent();

	if (milesToNext == 0){
		locale += 1;
		milesToNext = travelDistances[locale];
		$("#next").text(milesToNext);
		if (locationType[locale-1] == "river"){
			river_modal();
		}
		else if (locationType[locale-1] == "fort"){
			inFort = true;
			fort_modal();
		}

	}

	if (food < 0){
		food = 0;
	}

	update_display();
	if (milesToNext == travelDistances[locale]){
		var message = milesToNext + " miles to " + locationNames[locale+1];
		if (foodAndWater[locale] == 4){
			message += "\n There is little food and water for your oxen.";
		}
		else if (foodAndWater[locale] == 5){
			message += "\n Food and water is very scarce in these parts.";
		}
		alert_window(message);
	}
}


function randomEvent(){
	//var date_obj = new Date(year, month, day);
	var eventHappens = false;
	var random = randomNumber(1, 100);
	var blizzardMod = 0;
	if (weather == "snowy"){
		blizzardMod = 75;
	}
	else if (weather == "very cold"){
		blizzardMod = 50;
	}

	for (var i = 0; i < 5; i++){
		if (disease[i] == "none"){
			disease[i] = getDisease();
			if (disease[i] != "none"){
				stats[i] = 5;
				alert_window(party[i] + " has " + disease[i]);
				eventHappens = true;
				break;
			}
		}
	}

	if (!eventHappens){
		if (random <= blizzardMod){
			alert_window("severe blizzard lose a day");
			update_date();
			food -= partySize * rationsVal;
			updateHealth(false);
			updateWeather();
			eventHappens = true;
		}
	}

	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 5){
			var daysLost = randomNumber(1, 9);
			alert_window("impassable trail lose " + daysLost + " days");
			for (var i = 0; i < daysLost; i++){
				update_date();
				food -= partySize * rationsVal;
				updateHealth(false);
				updateWeather();
			}
			eventHappens = true;
		}
	}
	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 3){
			var bait_lost = randomNumber(20, 200);
			var clothes_lost = randomNumber(1, 10);
			var food_lost = randomNumber(5, 50);
			bait -= bait_lost;
			clothing -= clothes_lost;
			food -= food_lost;
			alert_window("You were robbed! You lost: \n" + bait_lost + " bait\n" + clothes_lost + " pairs of clothes\n" + food_lost + " Lbs. of food");
			eventHappens = true;
		}
	}
	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 3){
			food += 50;
			alert_window("Some friendly locals help you forage for food!");
			eventHappens = true;
		}
	}
	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 3){
			alert_window("A part has broken on the wagon would you like to fix it?")
			eventHappens = true;
		}
	}
	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 3 + foodAndWater[locale]){
			alert_window("One of your oxen has died");
			oxen -= 1;
			eventHappens = true;
		}	
	}
}

function getDisease(){
	var diseases = ["the measles", "a snakebite", "dysentery", "typhoid", "cholera", "exaustion", "a broken leg"];
	var num = randomNumber(1, 100);
	if (num <= 3){
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
		foodMod = -10;
	}

	var chanceOfRecovery = 100;
	/*console.log(weatherMod[weatherCode]);
	console.log(rationMod[rationsVal]);
	console.log(paceMods[paceVal]);
	console.log(foodMod);
	console.log(restingBonus);*/

	for (var i = 0; i < 5; i++) {
		if (disease[i] != "dead") {
			if (disease[i] != "none"){
				chanceOfRecovery = 75 + weatherMod[weatherCode] + rationMod[rationsVal] + paceMod + foodMod + restingBonus;
			} 
			else {
				chanceOfRecovery = 100 + weatherMod[weatherCode] + rationMod[rationsVal] + paceMod + foodMod + restingBonus;
			}
			var chance = randomNumber(1, 100);
			console.log(stats[i]);
			console.log(chance + " over " + chanceOfRecovery);
			if (chance <= chanceOfRecovery){
				stats[i] += 1;
			}
			else {
				stats[i] -= 1;
			}
			
			if (stats[i] > 10){
				stats[i] = 10;
			}
			if (stats[i] < 0){
				stats[i] = 0;
			}
			console.log(stats[i]);
			if (stats[i] <= 0){
				alert_window(party[i] + " has died of " + disease[i]);
				disease[i] = "dead";
				partySize -= 1;
				if (partySize == 0){
					alert_window("Everyone is dead!");
				}
			}
			if (health[i] == 10 && disease[i] != "none") {
				console.log("recovered");
				alert_window(party[i] + " has recovered!");
				disease[i] = "none";
			}
		}
	}

	var totalHealth = stats[0] + stats[1] + stats[2] + stats[3] + stats[4];
	totalHealth = Math.floor(totalHealth / 5);
	health = statuses[totalHealth];
}

function updateWeather(){
	//date_obj = new Date(year, month, day);
	// weather codes: very cold => 0, cold => 1, cool => 2, good => 3, warm => 4, hot => 5, very hot => 6, rainy => 7, very rainy => 8, snowy => 9
	var weatherTypes = ["very cold", "cold", "cool", "good", "warm", "hot", "very hot", "rainy", "very rainy", "snowy"];
	var weatherCodes = [[0, 0, 0, 0, 0, 0, 1, 9, 9, 9], [0, 0, 0, 0, 0, 1, 1, 1, 9, 9], [0, 0, 0, 1, 1, 1, 1, 1, 3, 9], [0, 1, 1, 1, 2, 2, 2, 7, 7, 8], [1, 1, 3, 3, 3, 3, 4, 4, 7, 7], [2, 3, 3, 4, 4, 4, 5, 5, 5, 7], [3, 3, 4, 4, 4, 4, 5, 5, 6, 7], [3, 4, 4, 4, 5, 5, 5, 6, 6, 6], [2, 2, 3, 3, 4, 4, 5, 5, 7], [1, 2, 2, 2, 3, 3, 3, 4, 7, 7], [0, 1, 1, 1, 1, 1, 2, 3, 7, 7], [0, 0, 0, 0, 1, 1, 1, 1, 9, 9]];
	weatherCode = weatherCodes[date_obj.getMonth()][randomNumber(0, 9)];
	weather = weatherTypes[weatherCode];
}

function open_trade(){
	var items = ["Oxen", "Food", "Clothing", "Bait", "Wheel", "Axle", "Tongue"];
	var trade_to = randomNumber(0, 6);
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
	$("#q_for").val(quantity_for);
	$("#i_for").val(trade_for);
	$("#q_to").val(quantity_to);
	$("#i_to").val(trade_to);
	var trade_string = quantity_for + " " + items[trade_for] + " for " + quantity_to + " " + items[trade_to] + ". You have " + you_have;
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

}

function randomNumber(min, max){
	return Math.floor(Math.random() * (max - min)) + min;
}

function river_modal(){
	$("#river_modal").css("visibility", "visible");
	$("#river_modal").dialog({
		//closeOnEscape: false,
		//open: function(event, ui){
			//$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		//},
		modal: true,
	});
}

function fort_modal(){
	$("#fort_modal").css("visibility", "visible");
	$("#fort_modal").dialog({
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
				$( this ).dialog( "close" );
				}
		}
		]
	});
}	

function update_display(){
	var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	$("#date").text(months[date_obj.getMonth()] + " " + date_obj.getDate() + " " + date_obj.getFullYear());
    $("#weather").text(weather);
    $("#health").text(health);
    $("#food").text(food);
    $("#next").text(milesToNext);
    $("#traveled").text(milesTraveled);
}

function update_date(){
	date_obj.setDate(date_obj.getDate() + 1);
	day = date_obj.getDate();
	month = date_obj.getMonth();
	year = date_obj.getFullYear();
}