// this gets and sends to sessions with ajax

//function getSession(){
$.ajax({url:"sessionGet.php", success: gotSess, error: bad});
//}

function gotSess(holder){
	//alert(holder);
	holder = (JSON.parse(holder));
	// get all party info from sessions
	window.party = JSON.parse(holder[0]);
	window.stats = JSON.parse(holder[1]);
	window.money = parseInt(holder[2]);
	window.oxen = parseInt(holder[3]);
	window.food = parseInt(holder[4]);
	window.clothing = parseInt(holder[5]);
	window.bait = parseInt(holder[6]);
	window.wheels = parseInt(holder[7]);
	window.axles = parseInt(holder[8]);
	window.tongues = parseInt(holder[9]);
	
	// get all game stats
	window.date = holder[10];
	window.pace = holder[11];
	window.paceVal = parseInt(holder[12]);
	window.rations = holder[13];
	window.rationsVal = parseInt(holder[14]);
	window.health = holder[15];
	window.weather = holder[16];
	window.weatherCode = parseInt(holder[17]);
	window.locale = parseInt(holder[18]);
	window.milesTraveled = parseInt(holder[19]);	
	window.milesToNext = parseInt(holder[20]);	
	window.profession = holder[21];
	window.disease = JSON.parse(holder[22]);
	window.partySize = holder[23];
	window.monthV = holder[24];
	window.dayV = holder[25];
	window.yearV = holder[26];
	alert(holder);
}


function sendSession(){
	// sends back all party info to the sessions 
	
	$.ajax({url:"sessionSend.php",
	//type: 'POST',
	data:{
	partyIn:party,
	statsIn:stats,
	moneyIn:money,
	oxenIn:oxen,
	foodIn:food,
	clothingIn:clothing,
	baitIn:bait,
	wheelsIn:wheels,
	axlesIn:axles,
	tonguesIn:tongues,
	
	dateIn:date,
	paceIn:pace,
	paceValIn:paceVal,
	rationsIn:rations,
	rationsValIn:rationsVal,
	healthIn:health,
	weatherIn:weather,
	weatherCodeIn:weatherCode,
	localeIn:locale,
	milesTraveledIn:milesTraveled,
	milesToNextIn:milesToNext,
	professionIn:profession,
	diseaseIn:disease,
	partySizeIn:partySize,
	monthVIn:monthV,
	dayVIn:dayV,
	yearVIn:yearV
	},
	error: bad
	});

	alert("Continue");	

}


function help(){
	alert(pace);
	
}

function bad(){
	alert("I died");
}

