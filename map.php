<?php
session_start();

/*
$_SESSION["party"] = 0;
$_SESSION["stats"] = 0;
$_SESSION["money"] = 0;
$_SESSION["oxen"] = 0;
$_SESSION["food"] = 0;
$_SESSION["clothing"] = 0;
$_SESSION["bait"] = 0;
$_SESSION["wheels"] = 0;
$_SESSION["axels"] = 0;
$_SESSION["tongues"] = 0;

$_SESSION["date"] = 0;
$_SESSION["pace"] = 0;
$_SESSION["paceVal"] = 0;
$_SESSION["rations"] = 0;
$_SESSION["rationsVal"] = 0;
$_SESSION["health"] = 0;
$_SESSION["weather"] = 0;
$_SESSION["weatherCode"] = 0;
$_SESSION["locale"] = 0;
$_SESSION["milesTraveled"] = 980;
$_SESSION["milesToNext"] = 0;
$_SESSION["profession"] = 0;
$_SESSION["disease"] = 0;
$_SESSION["partySize"] = 0;
$_SESSION["month"] = 0;
$_SESSION["day"] = 0;
$_SESSION["year"] = 0;
$_SESSION["broken"] = 0;
$_SESSION["split"] = 0;
*/


?>


<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Map</title>

<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript" src="sessions.js"></script>

  </head>
  <body onload="getSession()">

	<h1> Map </h1>
	
	 <form name="info" action="options.php" method="post">
 <button type="submit" onclick="sendSession()">Options</button>
 </form>


  <canvas id="map" width="1050" height="550" style="background-color:AntiqueWhite">
  <script>
  var locationNames = ["Independence", "Kansas River", "Big Blue River", "Fort Kearney", "Chimney Rock", "Fort Laramie", "Independence Rock", "South Pass", "Green River Crossing", "Fort Bridger", "Soda Springs", "Fort Hall", "Snake River Crossing", "Fort Boise", "Blue Mountains", "Fort Walla Walla", "Oregon City"];
var travelDistances = [102, 82, 118, 250, 86, 190, 102, 57, 143, 125, 162, 57, 182, 113, 160, 55, 0];
    var locationType = ["fort", "river", "river", "fort", "landmark", "fort", "landmark", "landmark", "river", "fort", "landmark", "fort", "river", "fort", "landmark", "fort"];
var offset = [[-10, 15], [0, 0], [0, 0], [-20, 15], [-20, 15], [-10, -15], [-40, 15], [-10, -15], [0, 0], [-20, 15], [-10, -15], [-10, -15], [0, 0], [-10, 15], [0, -15], [-50, 15], [-10, -15]];

var canvas = document.getElementById("map");
var ctx = canvas.getContext("2d");



var legend = new Image();
legend.src = "images/legend.png";
legend.onload = function(){
  ctx.drawImage(legend, -100, -450);
}




ctx.translate(950, 500);
var angle = 25 * Math.PI / 180;
var branchAngle1 = 54.012 * Math.PI / 180;
var branchAngle2 = 87.355 * Math.PI / 180;
var branchAngle3 = 33 * Math.PI / 180;

ctx.font = "12px Courier";

setTimeout(function(){

    if(milesTraveled > 930 && split == 1){
      ctx.rotate(angle);
      ctx.beginPath();
      ctx.moveTo(0, 0);
      ctx.lineTo(-1 * (930/2), 0);
      ctx.strokeStyle="#c41b1b";
      ctx.stroke();

      ctx.translate(-1 * (930/2), 0);
      

      var milesLeft = milesTraveled - 930;
      ctx.rotate(-1 * branchAngle1);
      ctx.beginPath();
      //      ctx.moveTo(-1 * (930/2), 0);
      var x1 = Math.min(milesLeft, 125);
      console.log("x1 = " + x1);
      //      ctx.lineTo(-1 * ((930 + x1) / 2), 0);
      ctx.moveTo(0, 0);
      ctx.lineTo(-1 * (x1/2), 0);
      ctx.strokeStyle="#c41b1b";
      ctx.stroke();



      milesLeft = milesLeft - x1;
      var x2 = Math.min(milesLeft, 162);
      console.log("x2 = " + x2);


      if(milesLeft > 0){
	ctx.translate(-1 * (x1/2), 0);
	
	ctx.rotate(branchAngle2);
	ctx.moveTo(0, 0);
	ctx.lineTo(-1 * (x2/2), 0);
	ctx.strokeStyle="#c41b1b";
	ctx.stroke();

      
	milesLeft = milesLeft - x2;
	console.log("x3 = " + milesLeft);

	if(milesLeft > 0){
	  ctx.translate(-1 * (x2/2), 0);


	  ctx.rotate(-1 * branchAngle3);


	  ctx.moveTo(0, 0);
	  ctx.lineTo(-1 * (milesLeft/2), 0);
	  ctx.stroke();

	  ctx.translate(1130/2, 0);
	}else{
	  ctx.rotate(-1 * branchAngle2);
	  ctx.translate(x1/2, 0);
	  ctx.rotate(branchAngle1);
	  ctx.translate(930/2, 0);
	}
      }else{
	ctx.rotate(branchAngle1);
	ctx.translate((930/2), 0);
      }
      



      ctx.rotate(-1 * angle);
	
    }else{
      ctx.rotate(angle);
      ctx.beginPath();
      ctx.moveTo(0, 0);
      ctx.lineTo(-1 * (milesTraveled/2), 0);
      ctx.strokeStyle="#c41b1b";
      ctx.stroke();
      ctx.rotate(-1 * angle);
    }

for(var i = 0; i < locationNames.length; i++){
  if(locationNames[i] == "Fort Bridger"){
    continue;
  }
  else if(locationType[i] != "river"){
    if(i%2 == 0){
      ctx.fillText(locationNames[i], offset[i][0], offset[i][1]);
    }else{
      ctx.fillText(locationNames[i], offset[i][0], offset[i][1]);
    }

    if(i == 0 || i == locationNames.length - 1){
      ctx.fillText("*", 0, 0);
    }
    else if(locationType[i] == "fort"){
      ctx.fillText("[]", 0, 0);
    }
    else{
      ctx.fillText("O", 0, 0);
    }
  }else{
    ctx.beginPath();
    ctx.moveTo(-50, 50);
    ctx.lineTo(50, -50);
    ctx.strokeStyle = '#7aaff8';
    ctx.stroke();
  }
  ctx.rotate(angle);

  if(locationNames[i] == "South Pass"){
    ctx.rotate(-1 * branchAngle1);
    ctx.translate(-125/2, 0);
    ctx.rotate(branchAngle1 - angle);
    ctx.fillText("[]", 0, 0);
    ctx.fillText(locationNames[i+2], offset[i+2][0], offset[i+2][1]);
    ctx.rotate(-1 * (branchAngle1 - angle));
    ctx.translate(125/2, 0);
    ctx.rotate(branchAngle1);
  }

  ctx.translate(-1 * (travelDistances[i]/2), 0);
  ctx.rotate(-1 * angle);
}
  }, 1000);


  </script>

  <br>
 <form name="info" action="options.php" method="post">
 <button type="submit" onclick="sendSession()">Options</button>
 </form>

    
  
  </body>
</html>
