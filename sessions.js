// this gets and sends to sessions with ajax


function getSession(){
	$.ajax({url:"sessionGet.php", success: gotSess});
}

function gotSess(sessIn){
	// get all party info from sessions 
	window.party = sessIn[0];
	window.stats = sessIn[1];
	window.money = sessIn[2];
	window.oxen = sessIn[3];
	window.food = sessIn[4];
	window.clothing = sessIn[5];
	window.hooks = sessIn[6];
	window.wheels = sessIn[7];
	window.axles = sessIn[8];
	window.tongues = sessIn[9];
	
	// get all game stats
	window.date = sessIn[10];
	window.pace = sessIn[11];
	window.paceVal = sessIn[12];
	window.rations = sessIn[13];
	window.rationVal = sessIn[14];
	window.health = sessIn[15];
	window.weather = sessIn[16];
	window.weatherCode = sessIn[17];
	window.locale = sessIn[18];
	window.milesTraveled = sessIn[19];	
	window.milesToNext = sessIn[20];	
	
}


function sendSession(){
	// sends back all party info to the sessions 
	$.ajax({url:"sessionSend.php", post,
	parameters:{
	partyIn:party,
	statsIn:stats,
	moneyIn:money,
	oxenIn:oxen,
	foodIn:food,
	clothingIn:clothing,
	hooksIn:hooks,
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
	milesToNextIn:milesToNext
	}
	
	});
}
