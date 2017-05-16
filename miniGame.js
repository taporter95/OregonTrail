alert("To play, press the right and left arrow keys.\n Dodge the rocks and land up ahead on the marked shore");

var left = 620;
var rockTops = [0, 650,750,850,950,1050];
var rockLefts = [0, 620,620,620,620,620];
var crash = false;
var counter = 0;
var endzoneTop = 650;

//set for testing, actual = 1000
setInterval('updateGame()', 250);

//updates the game as per the interval's instructions
function updateGame(){
	console.log("gameUpdate");
	moveRocks();
	if (collision()){
		// update materials lost/ people dying
		
		// check if all are dead, end game -> load Gameover screen
		
		console.log("Hit a rock");
		// blink for a bit
		
		crash = false;
	}
	counter++;
	// waiting mechanism for end game
	if (counter > 20){
		
		endzoneTop -= 10;
		$("#end").css('top', endzoneTop);
		$("#end").css('visibility', 'visible');
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


// almost always says its colliding...
//checks all rocks to see if they intersected with boat
function collision() {
        var boatLeft = left;
        var boatRight = left + $("#boat").css('width');
        var boatBottom = $("#boat").css('height');
		// number of rocks max = 5
		for (i = 1; i < 6; i++) {
			// +50 cause rock width = 50
			if ((boatBottom < rockTops[i]) || (boatRight < rockLefts[i]) || (boatLeft > rockLefts[i] + 50)) {
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
