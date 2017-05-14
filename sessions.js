// this gets and sends to sessions with ajax

//function getSession(){
$.ajax({url:"sessionGet.php", success: gotSess, error: bad});
//}

function gotSess(holder){
	//alert(holder);
	holder = (JSON.parse(holder));
	// get all party info from sessions
	window.party = JSON.parse(holder[0]);
	window.tempStats = JSON.parse(holder[1]);
	window.stats = [];
	for (var i = 0; i < 5; i++){
		window.stats.push(parseInt(window.tempStats[i]));
	}
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
	window.partySize = parseInt(holder[23]);
	window.month = parseInt(holder[24]);
	window.day = parseInt(holder[25]);
	window.year = parseInt(holder[26]);
	alert(JSON.parse(holder));
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
	monthIn:month,
	dayIn:day,
	yearIn:year
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

