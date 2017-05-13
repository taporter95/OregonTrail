	
var locationNames = ["Independence", "Kansas River", "Big Blue River", "Fort Kearney", "Chimney Rock", "Fort Laramie", "Independence Rock", "South Pass", "Green River Crossing", "Fort Bridger", "Soda Springs", "Fort Hall", "Snake River Crossing", "Fort Boise", "Blue Mountains", "Fort Walla Walla"];
var travelDistances = [102, 82, 118, 250, 86, 190, 102, 57, 125, 143, 162, 57, 182, 113, 160, 55];
var locationType = ["fort", "river", "river", "fort", "landmark", "fort", "landmark", "landmark", "river", "fort", "landmark", "fort", "river", "fort", "landmark", "fort"];
var foodAndWater = [0, 0, 1, 1, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 5];


function continueTrail(){
	//var date_obj = new Date(year, month, day);

	milesToNext -= (paceVal * (Math.floor(oxen / 3))) + 10;
	milesTraveled += parseInt((paceVal * (Math.floor(oxen / 3))) + 10);
	if (milesToNext < 0) {
		milesTraveled += milesToNext;
		milesToNext = 0;
	}	

	date_obj.setDate(date_obj.getDate() + 1);
	day = date_obj.getDay();
	month = date_obj.getMonth();
	year = date_obj.getFullYear();
	food -= partySize * rationsVal;
	
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
				health[i] = 5;
				stats[i] = "fair";
				alert_window(party[i] + " has " + disease[i]);
				eventHappens = true;
				break;
			}
		}
	}

	if (!eventHappens){
		if (random <= blizzardMod){
			alert_window("severe blizzard lose a day");
			date_obj.setDate(date_obj.getDate() + 1);
			day = date_obj.getDay();
			month = date_obj.getMonth();
			year = date_obj.getFullYear();
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
				date_obj.setDate(date_obj.getDate() + 1);
				day = date_obj.getDay();
				month = date_obj.getMonth();
				year = date_obj.getFullYear();
				food -= partySize * rationsVal;
				updateHealth(false);
				updateWeather();
			}
			eventHappens = true;
		}
	}
	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 5){
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
		if (random <= 5){
			food += 50;
			alert_window("Some friendly locals help you forage for food!");
			eventHappens = true;
		}
	}
	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 5){
			alert_window("A part has broken on the wagon would you like to fix it?")
			eventHappens = true;
		}
	}
	if (!eventHappens){
		random = randomNumber(1, 100);
		if (random <= 5 + foodAndWater[locale]){
			alert_window("One of your oxen has died");
			oxen -= 1;
			eventHappens = true;
		}	
	}

}

function getDisease(){
	var diseases = ["the measles", "a snakebite", "dysentery", "typhoid", "cholera", "exaustion", "a broken leg"];
	var num = randomNumber(1, 100);
	if (num <= 5){
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
	var rationMod = [-15, -5, 0];
	var paceMods = [-10, -15, -20];
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

	for (var i = 0; i < 5; i++) {
		if (health[i] != 0) {
			if (disease[i] != "none"){
				chanceOfRecovery = 75 + weatherMod[weatherCode] + rationMod[rationsVal] + paceMod + foodMod + restingBonus;
			} 
			else {
				chanceOfRecovery = 100 + weatherMod[weatherCode] + rationMod[rationsVal] + paceMod + foodMod + restingBonus;
			}
			var chance = randomNumber(1, 100);
			if (chance <= chanceOfRecovery){
				health[i] += 1;
			}
			else {
				health[i] -= 1;
			}

			if (health[i] < 0){
				health[i] = 0;
			}

			stats[i] = statuses[health[i]];
			if (stats[i] == "dead"){
				alert_window(party[i] + " has died of " + disease[i]);
			}
			if (health[i] == 10) {
				disease[i] = "none";
			}
		}
	}

	var totalHealth = health[0] + health[1] + health[2] + health[3] + health[4];
	totalHealth = Math.floor(totalHealth / 5);
	partyHealth = statuses[totalHealth];
}

function updateWeather(){
	//date_obj = new Date(year, month, day);
	// weather codes: very cold => 0, cold => 1, cool => 2, good => 3, warm => 4, hot => 5, very hot => 6, rainy => 7, very rainy => 8, snowy => 9
	var weatherTypes = ["very cold", "cold", "cool", "good", "warm", "hot", "very hot", "rainy", "very rainy", "snowy"];
	var weatherCodes = [[0, 0, 0, 0, 0, 0, 1, 9, 9, 9], [0, 0, 0, 0, 0, 1, 1, 1, 9, 9], [0, 0, 0, 1, 1, 1, 1, 1, 3, 9], [0, 1, 1, 1, 2, 2, 2, 7, 7, 8], [1, 1, 3, 3, 3, 3, 4, 4, 7, 7], [2, 3, 3, 4, 4, 4, 5, 5, 5, 7], [3, 3, 4, 4, 4, 4, 5, 5, 6, 7], [3, 4, 4, 4, 5, 5, 5, 6, 6, 6], [2, 2, 3, 3, 4, 4, 5, 5, 7], [1, 2, 2, 2, 3, 3, 3, 4, 7, 7], [0, 1, 1, 1, 1, 1, 2, 3, 7, 7], [0, 0, 0, 0, 1, 1, 1, 1, 9, 9]];
	weatherCode = weatherCodes[date_obj.getMonth()][randomNumber(0, 9)];
	weather = weatherTypes[weatherCode];
}


function randomNumber(min, max){
	return Math.floor(Math.random() * (max - min)) + min;
}

function river_modal(){
	$("#river_modal").css("visibility", "visible");
	$("#river_modal").dialog({
		closeOnEscape: false,
		open: function(event, ui){
			$(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
		},
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

function update_display(){
	//var date_obj = new Date(year, month, day);
	$("#date").text(date_obj);
    $("#weather").text(weather);
    $("#health").text(health);
    $("#food").text(food);
    $("#next").text(milesToNext);
    $("#traveled").text(milesTraveled);
}