
var caravan = new Object();
caravan.party = [];
caravan.status = ["good", "good", "good", "good", "good"];
caravan.diseases = ["none", "none", "none", "none", "none"];
caravan.health = [10, 10, 10, 10, 10];
caravan.partyHealth = "good";
caravan.money = 0;
caravan.oxen = 0;
caravan.food = 0;
caravan.clothing = 0;
caravan.ammo = 0;
caravan.parts = [0, 0, 0];

var gameStats = new Object();
gameStats.date = new Date();
gameStats.pace = "steady";
gameStats.paceVal = 1;
gameStats.rations = "filling";
gameStats.rationVal = 3;
gameStats.health = "good";
gameStats.weather = "warm";
gameStats.weatherCode = 1;
gameStats.location = 0;
gameStats.milesTraveled = 0;
gameStats.milesToNext = 0;

var locationNames = ["Independence", "Kansas River", "Big Blue River", "Fort Kearney", "Chimney Rock", "Fort Larmite", "Independence Rock", "South Pass", "Green River Crossing", "Fort Bridger", "Soda Springs", "Fort Hall", "Snake River Crossing", "Fort Boise", "Blue Mountains"];
var travelDistances = [102, 82, 118, 250, 86, 190, 102, 57, 125, 143, 162, 57, 182, 113, 160];
var locationType = ["fort", "river", "river", "fort", "landmark", "fort", "landmark", "landmark", "river", "fort", "landmark", "fort", "river", "fort", "landmark"];

chooseClassAndNames();

function chooseClassAndNames(){
	moneyOptions = ["error", 1600, 800, 400];
	multipliers = ["error", 1, 2, 3];
	console.log("Choose class");
	console.log("1 : banker");
	console.log("2 : carpenter");
	console.log("3 : farmer");
	var profession = parseInt(prompt("Enter Profession"));
	
	caravan.money = moneyOptions[profession];
	caravan.score_multiplier = multipliers[profession];
	
	console.log("When do you want to leave?");
	console.log("1. March");
	console.log("2. April");
	console.log("3. May");
	console.log("4. June");
	console.log("5. July");
	var month = 2 + parseInt(prompt("When do you want to leave"));
	gameStats.date = new Date(1848, month, 1);
	buySupplies();
}

function buySupplies(){
	var bill = [0, 0, 0, 0, 0, 0];
	var input = 0;
	while (input != 6){
		bill[0] = bill[1] + bill[2] + bill[3] + bill[4] + bill[5];
		console.log("what would you like to buy?");
		console.log("1. Oxen             $" + bill[1]);
		console.log("2. Food             $" + bill[2]);
		console.log("3. clothing         $" + bill[3]);
		console.log("4. Ammunition       $" + bill[4]);
		console.log("5. Spare Parts      $" + bill[5]);
		console.log("--------------------------------");
		console.log("         Total Bill:  $" + bill[0]);
		console.log("\n money: " caravan.money);
		input = parseInt(prompt("What would you like to buy?"));
		if (input < 5){
			bill[input] = buyItem(input);
		}
	}

	caravan.oxen = (bill[1] / 40) * 2;
	caravan.food = bill[2] / 0.20;
	caravan.clothing = bill[3] / 10;
	caravan.ammo = (bill[4] / 2) * 20;
	caravan.parts[0] = bill[5] / 30;
	caravan.parts[1] = bill[5] / 30;
	caravan.parts[2] = bill[5] / 30;

	situation(true);
}

function buyItem(item){
	var input = 0;
	if (item == 1){
		input = parseInt(prompt("How many yokes?"));
		return 40 * input;
	}
	else if (item == 2){
		input = parseInt(prompt("How much food?"));
		return 0.20 * input;
	}
	else if (item == 3){
		input = parseInt(prompt("How many clothes?"));
		return 10 * input;
	}
	else if (item == 4){
		input = parseInt(prompt("How many boxes of bullets?"));
		return 2 * input;
	}
	else if (item == 5){
		input = parseInt(prompt("How many of each?"));
		return 10 * 3 * input;
	}
	else {
		return 0;
	}
}

function situation(inTown){
	console.log("You may: ");
	console.log("	1.  Continue on trail");
	console.log("	2.  Check supplies");
	console.log("	3.  Look at map");
	console.log("	4. 	Change pace");
	console.log("	5.  Change food rations");
	console.log("	6. 	Stop to rest");
	console.log("	7.  Attempt to trade");
	if (inTown == true){
		console.log("	8.  Talk to people");
	}
	else {
		console.log("	8.  Hunt for food");
	}
	if (inTown == true){
		console.log("	9.  Buy supplies");
	}
	var input = parseInt(prompt("What would you like to do?"));
	takeAction(input);
	if (input != 1){
		situation(inTown);
	}
}

function takeAction(action){
	var input = 0;
	var pace = ["error", "steady", "strenuous", "grueling"];
	var rations = ["error", "bare bones", "meager", "filling"]; 

	if (action == 1){
		travel();
	}
	else if (action == 2){
		
	}
	else if (action == 3){
		
	}
	else if (action == 4){
		console.log("Change pace");
		console.log("1.  a steady pace");
		console.log("2.  a strenuous pace");
		console.log("3.  a grueling pace");
		input = parseInt(prompt());
		gameStats.paceVal = input;
		gameStats.pace = pace[input];
	}
	else if (action == 5){
		console.log("Change rations");
		console.log("1.  bare bones");
		console.log("2.  meager");
		console.log("3.  filling");
		input = parseInt(prompt());
		gameStats.rationVal = input;
		gameStats.rations = rations[input];
	}
	else if (action == 6){
		input = parseInt(prompt("How many days?"));
		rest(input);
	}
}

function travel(){
	if (gameStats.milesToNext == 0){
		gameStats.location += 1;
		gameStats.milesToNext = travelDistances[gameStats.location];
	}
	if (gameStats.milesToNext == travelDistances[gameStats.location]){
		console.log(gameStats.milesToNext + " miles to " + locationNames[gameStats.location + 1]);
	}

	displayStats();

	gameStats.milesToNext -= (gameStats.pace * 10) + 10;

	for (var i = 0; i < 5; i++){
		if (caravan.diseases[i] == "none"){
			caravan.diseases[i] = getDisease();
			if (caravan.diseases[i] != "none"){
				caravan.health[i] = 5;
				caravan.status[i] = "fair";
				console.log(caravan.party[i] + " has " + caravan.diseases[i]);
				break;
			}
		}
	}

	updateHealth(false);

	if (gameStats.milesToNext < 0) {
		gameStats.milesToNext = 0;
	}
	var choice = prompt("would you like to take an action?");
	if (choice == "y"){
		situation(false);
	}
	travel();
}

function displayStats(){
	console.log("Date: " + gameStats.date);
	console.log("Pace: " + gameStats.pace);
	console.log("Rations: " + gameStats.rations);
}

function rest(numDays){
	for (var i = 0; i < numDays; i++){
		updateHealth(true);
	}
}

function display(message){
	document.getElementById("message").innerHTML = message;
}

function getInput(number){
	var input = document.getElementById("input").innerHTML;
	if (number){
		input = parseInt(input);
	}
	return input;
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
	var restingBonus = 0;
	if (resting){
		restingBonus = 15;
	}
	//weather: good, warm, hot, very hot, cold, very cold
	var statuses = ["dead", "poor", "poor", "poor", "poor", "fair", "fair", "fair", "fair", "good", "good"];
	var weatherMod = [10, 5, -5, -10, -5, -15];
	var rationMod = [-5, 5, 10];
	var paceMods = [0, -5, -10];
	var paceMod = 0;
	
	if (!resting){
		paceMod = paceMods[gameStats.paceVal];
	}

	var chanceOfRecovery = 50 + weatherMod[gameStats.weatherCode] + rationMod[gameStats.rationVal] + paceMod + restingBonus;

	for (var i = 0; i < 5; i++) {
		if (caravan.health[i] > 0 || caravan.health[i] < 10) { 
			var chance = randomNumber(1, 100);
			if (chance <= chanceOfRecovery){
				caravan.health[i] += 1;
			}
			else {
				caravan.health[i] -= 1;
			}
			caravan.status[i] = statuses[caravan.health[i]];
			if (caravan.status[i] == "dead"){
				console.log(caravan.party[i] + " has died");
			}
			if (caravan.health[i] == 10) {
				caravan.diseases[i] = "none";
			}
		}
	}

	var totalHealth = caravan.health[0] + caravan.health[1] + caravan.health[2] + caravan.health[3] + caravan.health[4];
	totalHealth = Math.floor(totalHealth / 5);
	caravan.partyHealth = statuses[totalHealth];
}

function randomNumber(min, max){
	return Math.floor(Math.random() * (max - min)) + min;
}
