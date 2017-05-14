// this gets and sends to sessions with ajax

//function getSession(){
$.ajax({url:"sessionGet.php", success: gotSess, error: bad});
//}

function gotSess(holder){
	alert(holder);
	holder = (JSON.parse(holder));
	// get all party info from sessions
	window.party = JSON.parse(holder[0]);
	window.tempStats = JSON.parse(holder[1]);
	window.stats = [];
	for (var i = 0; i < 5; i++){
		window.stats.push(parseInt(window.tempStats[i]));
	}
	window.money = JSON.parse(holder[2]);
	window.oxen = JSON.parse(holder[3]);
	window.food = JSON.parse(holder[4]);
	window.clothing = JSON.parse(holder[5]);
	window.bait = JSON.parse(holder[6]);
	window.wheels = JSON.parse(holder[7]);
	window.axles = JSON.parse(holder[8]);
	window.tongues = JSON.parse(holder[9]);

	// get all game stats
	window.date = holder[10];
	window.pace = JSON.parse(holder[11]);
	window.paceVal = JSON.parse(holder[12]);
	window.rations = JSON.parse(holder[13]);
	window.rationsVal = JSON.parse(holder[14]);
	window.health = JSON.parse(holder[15]);
	window.weather = JSON.parse(holder[16]);
	window.weatherCode = JSON.parse(holder[17]);
	window.locale = JSON.parse(holder[18]);
	window.milesTraveled = JSON.parse(holder[19]);	
	window.milesToNext = JSON.parse(holder[20]);	
	window.profession = JSON.parse(holder[21]);
	window.disease = JSON.parse(holder[22]);
	window.partySize = JSON.parse(holder[23]);
	window.month = JSON.parse(holder[24]);
	window.day = JSON.parse(holder[25]);
	window.year = JSON.parse(holder[26]);

	alert(holder);
	console.log("got session vars");
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

