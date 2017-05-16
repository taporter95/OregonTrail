<?php
session_start();

//$_SESSION["food"] = 200;

/*
$_SESSION["party"] = 0;
$_SESSION["stats"] = 0;
$_SESSION["money"] = 0;
$_SESSION["oxen"] = 0;
$_SESSION["food"] = 200;
$_SESSION["clothing"] = 0;
$_SESSION["bait"] = 50;
$_SESSION["wheels"] = 0;
$_SESSION["axles"] = 0;
$_SESSION["tongues"] = 0;

$_SESSION["date"] = 0;
$_SESSION["pace"] = 0;
$_SESSION["paceVal"] =0;
$_SESSION["rations"] = 0;
$_SESSION["rationsVal"] = 0;
$_SESSION["health"] = 0;
$_SESSION["weather"] = 0;
$_SESSION["weatherCode"] = 0;
$_SESSION["locale"] = 0;
$_SESSION["milesTraveled"] = 0;
$_SESSION["milesToNext"] = 0;
$_SESSION["profession"] = 0;
$_SESSION["disease"] = 0;
*/
?>

<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Fish</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="sessions.js"></script>
	  	<link rel="stylesheet" href="style.css">

  </head>
  <body>

	<h1> Fish </h1>

	<img src="images/fish.png">
	
    <script>
		var thisisbad = setTimeout(function(){
			var b = bait;
			var f = food;

			console.log("bait: " + b);
			console.log("food: " + f);

			var totalWeight = 0;
			var iterations = 10;

			var count = 0;

			//run fishing game over a set amount of iterations
			for(var i = 0; i < iterations; i++){
				console.log("i = " + i);
				//generate an amount of time before a fish appears
				var time = Math.floor((Math.random() * 30000) + 10000);

				var catchFish = setTimeout(function(){
					//a fish appears
					//make a button to reel in
					document.getElementById("fish").innerHTML = "You feel something pull on the rod.<br><br>";
					var button = document.createElement("button");
					button.innerHTML = "Reel In";
					document.getElementById("fish").appendChild(button);
			
					//button to reel in fish
					button.addEventListener("click", function(){
						clearInterval(bad);
						//if there is no bait, player doesn't get a fish
						if(b == 0){
							alert("You don't have enough bait!");
							return;
						}

						//use one bait to catch a fish
						b -= 1;

						//fish has a 1/3 chance of escaping
						var chance = Math.floor((Math.random() * 3) + 1);
						if (chance < 2){
							alert("It got away!");
						}else{
							//give random weight to fish that is caught
							var weight = Math.floor((Math.random() * 50) + 1);
							totalWeight += weight;
							alert("You caught a fish! It weighs "+weight+" pounds.");
						}
						document.getElementById("fish").innerHTML = "You're waiting for a fish to bite";

					});
					
					//set timeout before a fish disappears
					var bad = setTimeout(function(){
						if(count < iterations){
							document.getElementById("fish").innerHTML = "You're waiting for a fish to bite";
						}
					}, 5000);
					
						
					count += 1;
					console.log("count = " + count);
					
					//if number of iterations reaches the set amount
					//show them the end screen
					if(count >= iterations){
						clearInterval(catchFish);
						clearInterval(bad);
						getFood(totalWeight, f);
						bait = b;
						return;
					}
					
				}, time);
					  

			}
					  
		}, 1000);

	    	//shows how much food they caught
	    	//if it's more than 100 pounds, they only keep 100 lbs
	    	//else give them the full amount that they caught
		function getFood(tw, f){
			if(tw > 100){
				document.getElementById("fish").innerHTML = "You got " + tw + " pounds of food but you can only manage to carry back 100 pounds.<br><br>";
				food = parseInt(f) + 100;
			}else{
				document.getElementById("fish").innerHTML = "You got " + tw + " pounds of food.<br><br>";
				food = parseInt(f) + parseInt(tw);
			}

			
			console.log("the end");
			
			//send them back to the options page
			document.getElementById("fish").innerHTML += "<form name=\"info\" action=\"options.php\" method=\"post\"><button type=\"submit\" onclick=\"sendSession()\">Options</button></form>";
			
		 }

    </script>

    <p id="fish">You're waiting for a fish to bite</p>



	


  
  </body>
</html>
