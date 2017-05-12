// this gets and sends to sessions with ajax

function getSession(){
	$.ajax({url:"sessionGet.php", success: gotSess, error: bad});
}

function gotSess(holder){
	//alert(holder);
	holder = (JSON.parse(holder));
	// get all party info from sessions
	window.party = holder[0];
	window.stats = holder[1];
	window.money = holder[2];
	window.oxen = holder[3];
	window.food = holder[4];
	window.clothing = holder[5];
	window.bait = holder[6];
	window.wheels = holder[7];
	window.axles = holder[8];
	window.tongues = holder[9];
	
	// get all game stats
	window.date = holder[10];
	window.pace = holder[11];
	window.paceVal = holder[12];
	window.rations = holder[13];
	window.rationsVal = holder[14];
	window.health = holder[15];
	window.weather = holder[16];
	window.weatherCode = holder[17];
	window.locale = holder[18];
	window.milesTraveled = holder[19];	
	window.milesToNext = holder[20];	
	window.profession = holder[21];
	window.disease = holder[22];
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
	diseaseIn:disease
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

