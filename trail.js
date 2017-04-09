var caravan {
	party: [];
	status: [];
	health: "good";
	money: 0;
	oxen: 0;
	food: 0;
	clothing: 0;
	ammo: 0;
	wheels: 0;
	axles: 0;
	tongues: 0;
	score_multiplier: 1;
};

var gameStats {
	date: new Date();
	pace: "steady";
	paceVal: 1;
	rations: "filling";
	rationVal: 3;
	health: "good";
	location: 0;
	milesTraveled: 0;
	milesToNext: 0;
};

var locationNames = ["Independence", "Kansas River", "Big Blue River", "Fort Kearney", "Chimney Rock", "Fort Larmite", "Independence Rock", "South Pass", "Green River Crossing", "Fort Bridger", "Soda Springs", "Fort Hall", "Snake River Crossing", "Fort Boise", "Blue Mountains"];
var travelDistances = [102, 82, 118, 250, 86, 190, 102, 57, 125, 143, 162, 57, 182, 113, 160];
var locationType = ["fort", "river", "river", "fort", "landmark", "fort", "landmark", "landmark", "river", "fort", "landmark", "fort", "river", "fort", "landmark"];

function chooseClassAndNames(){
	console.log("Choose class");
	console.log("1 : banker");
	console.log("2 : carpenter");
	console.log("3 : farmer");
	var profession = parseInt(prompt());
	if (profession == 1){
		caravan.money = 1600;
		caravan.score_multiplier = 1;
	}
	else if (profession == 2){
		caravan.money = 800;
		caravan.score_multiplier = 2;
	}
	else if (profession == 3){
		caravan.money = 400;
		caravan.score_multiplier = 3;
	}
	for (var i = 0; i < 5; i++){
		caravan.party.push(prompt("Enter party member name: "));
		caravan.status.push(10);
	}
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
		input = parseInt(prompt("What would you like to buy?"));
		if (input > 5){
			bill[input] = buyItem(input);
		}
	}

	caravan.oxen = (bill[1] / 40) * 2;
	caravan.food = bill[2] / 0.20;
	caravan.clothing = bill[3] / 10;
	caravan.ammo = (bill[4] / 2) * 20;
	caravan.wheels = bill[5] / 30;
	caravan.axles = bill[5] / 30;
	caravan.tongues = bill[5] / 30;

	situation(true);
}

function buyItem(item){
	var input = 0;
	if (item == 1){
		input = parseInt(prompt("How many yokes?"));
		return 40 * input;
	}
	else if (input == 2){
		input = parseInt(prompt("How much food?"));
		return 0.20 * input;
	}
	else if (input == 3){
		input = parseInt(prompt("How many clothes?"));
		return 10 * input;
	}
	else if (input == 4){
		input = parseInt(prompt("How many boxes of bullets?"));
		return 2 * input;
	}
	else if (input == 5){
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
	console.log("   6. 	Stop to rest");
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
		gameStats.milesToNext = travelDistances[location];
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
	if (gameStats.milesToNext == travelDistances[location]){
		console.log(gameStats.milesToNext + " miles to " + locationNames[location + 1]);
	}
	gameStats.milesToNext -= (gameStats.pace * 10) + 10;
	travel();
}

function rest(numDays){

}

/*function randomNumber(min, max){
	Math.floor(Math.random())
}*/
