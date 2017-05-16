alert("To play, press the right and left arrow keys.\n Dodge the rocks and land up ahead on the marked shore");

var left = 620;
var rockTops = [0, 650,750,850,950,1050];
var rockLefts = [0, 620,620,620,620,620];
var crash = false;
var counter = 0;
var endzoneTop = 650;
var blinking = false;
var blinkCount = 0;


setInterval('updateGame()', 100);

//updates the game as per the interval's instructions
function updateGame(){
	//console.log("gameUpdate");
	moveRocks();
	if (collision()){
		if (!blinking){
			blinking = true;
			setTimeout('changeBlink()', 90);
			// announce lost materials
			alert("You lost: " +
			Math.round(money*1/5) + " dollars, " +
			Math.round(oxen*1/5) + " oxen, " +
			Math.round(food*1/5) + " food, " +
			Math.round(clothing*1/5) + " clothes, " +
			Math.round(bait*1/5) + " bait, " +
			Math.round(wheels*1/3) + " wheels, " +			
			Math.round(axles*1/3) + " axles, " +
			Math.round(tongues*1/3) + " tongues");
			
			//lose the materials
			money = Math.round(money*4/5);
			oxen = Math.round(oxen*4/5);
			food = Math.round(food*4/5);
			clothing = Math.round(clothing*4/5);
			bait = Math.round(bait*4/5);
			wheels = Math.round(wheels*2/3);
			axles = Math.round(axles*2/3);
			tongues = Math.round(tongues*2/3);
			
			if (partySize >0){
				var i=4;
				var dead = false;
				for (i;i >= 0; i--){
					console.log(stats[i]);
					if(stats[i] !== 0 && !dead){
						stats[i] = 0;
						dead = true;
					}
				}
				alert(party[i] + " is dead");
				partySize--;
			}
			if (partySize <= 0){
				alert("everyone died");
				//REDIRECT TO GAMEOVER
				window.location.replace("gameOver.php");
			}
			
		}
		else if(blinking && blinkCount < 10){
			blinkCount++;
			setTimeout('changeBlink()', 90);
		}
		else{
			blinking = false;
			blinkCount = 0;
			crash = false;
			$("#boat").css('visibility', 'visible');
			$("#bimg").css('visibility', 'visible');
		}
		
		
	}
	counter++;
	// waiting mechanism for end game
	if (counter > 200){
		var boatLeft = left;
        var boatRight = left + 50;
        var boatBottom = 250;
		endzoneTop -= 10;
		$("#end").css('top', endzoneTop);
		$("#end").css('visibility', 'visible');
		if ( ((boatBottom >= endzoneTop +60) && (boatBottom - 50 <= endzoneTop + 510))  && (boatRight > 820) ){
			sendSession();
			alert("You made it!");
			//REDIRECT TO WINNER
			window.location.replace("end.php");

		}
		if (endzoneTop+510 < 200){
			endzoneTop = 650;
			$("#end").css('top', endzoneTop);
		}
			
	}
}

// this works fine
// This function repositions and moves rocks up the page
function moveRocks(){
	for (i = 1; i < 6; i++) {
		var rockNum = "rock" + i;
		if  (rockTops[i] == 650){
			
			// randomizes rock left if starting
			rockLefts[i] = randomNumber(420, 820);
			document.getElementById(rockNum).style.left = rockLefts[i] + "px";
			document.getElementById(rockNum).style.visibility = "visible";

		}
		else if (rockTops[i] < 150){
			rockTops[i] = 650;
		}
		rockTops[i] -= 10;
		if (document.getElementById(rockNum).style.visibility == "visible"){
			document.getElementById(rockNum).style.top = rockTops[i] + "px";
		}
	}
}


//  this works fine
//checks all rocks to see if they intersected with boat
function collision() {
        var boatLeft = left;
        var boatRight = left + 50;
        var boatBottom = 250;
		// number of rocks max = 5
		for (i = 1; i < 6; i++) {
			// +50 cause rock width = 50
			if ((boatBottom >= rockTops[i]) &&( ((boatRight >= rockLefts[i])&&(boatLeft <= rockLefts[i])) || ((boatRight >= rockLefts[i] +50)&&(boatLeft <= rockLefts[i] +50)) )) {
				crash = true;
				return crash;
			}
		}
        return crash;
}

// brought from trailFunctions.js to prevent loading that whole file
function randomNumber(min, max){
	return Math.floor(Math.random() * (max - min)) + min;
}

function changeBlink(){
	
	if (document.getElementById("boat").style.visibility == "visible"){
		$("#boat").css('visibility', 'hidden');
		$("#bimg").css('visibility', 'hidden');

	}
	else{
		$("#boat").css('visibility', 'visible');
		$("#bimg").css('visibility', 'visible');

	}

}