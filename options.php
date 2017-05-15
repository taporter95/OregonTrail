


<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Options</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script type="text/javascript" src="sessions.js"></script>
  <!-- everything for my modal stuff -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="boxStyle.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<script> 
var talkin = ["The trail is tough, be careful.",
"Be careful Fording deep rivers, all my friends died all at once.",
"Keep spare parts around, never know when something will go wrong.",
"If you wait around too long, winter will strike hard later in your travels",
"I hear that fish are plentiful almost anywhere you go.",
"Ya know, Natives round these parts love tradin'. Keep some spare clothes and parts for 'em.",
"If the river is deep, dont risk it. Take the ferry or follow the Natives.",
"Remember, time heals all wounds",
"If ya arn't feelin' too good, eat up to keep ya strength up.",
"There are many stops on the way, remember to keep some cash."];
 </script>  
  

  
  
  
  
  </head>
  <body>
  


	<h1> Options </h1>
  <form name="info" action="game.php" method="post">
  <button type="submit" onclick="sendSession()">Game</button>
  </form>
    
	
  <form name="info" action="fish.php" method="post">
  <button type="submit" onclick="sendSession()">Fishing</button>
  </form>
  
  <form action="genStore.php" method="post">
  <?php
 
if (isset($_POST['fort'])){
 echo("<button type='submit' onclick='sendSession()'>  Buy from Shop </button> ");
}
?>

</form>
  

  <button id="pace">Change Pace</button>
  <button id="supplies">View Supplies</button>
  <button id="map">Show Map</button>
  <button id="rations">Change Rations</button>
  <button id="rest" onclick="rest()">Rest Up</button>
  <button id="trade" onclick="open_trade()">Trade with Locals</button>
  <!--<button id="help" onclick="startUp()">help</button>
  
  <!-- ADD IN IF IN TOWN THEN TALK TO PEOPLE??? -->
<?php
 
if (isset($_POST['fort'])){
 echo("<button id='talk' >Talk to Townsfolk</button>");
}

?>
  
  
  <div id="paceBox" class="modalBox" title="Pace">
  <p>Please choose which paceat which you would like to travel.</p>
</div>

<div id="supplyBox" class="modalBox" title="Supplies">
  <p id="supplyList"> This is a list of your supplies.</p>
</div>

<div id="mapBox" class="modalBox" title="Map">
  <p> I'm going to be replaced with a map.</p>
</div>

<div id="rationBox" class="modalBox" title="Rations">
  <p> How would you like to change your rations amount?</p>
</div>

<div id="restBox" class="modalBox" title="Resting">
  <p> How long would you like to rest? </p>
  
 <input type="number" id="waiting" min="0" value="0">

  
</div>

<div id="tradeBox" class="modalBox" title="Trading">
  <p>You meet a man wanting to trade, he offers you</p>
  <p id="trade_string"></p>
  <input type="hidden" id="q_for">
  <input type="hidden" id="i_for">
  <input type="hidden" id="q_to">
  <input type="hidden" id="i_to">
</div>

<div id="talkBox" class="modalBox" title="Talking">
  <p id="talking"> Decide what to say</p>
</div>


<div id="alert" class="modalBox" title="alert">
  <p id="alert_text"></p>
</div>



 
<script type="text/javascript" src="trailFunctions.js"> </script>   
<script>
$( function() {
  
	$("#pace").click(function(){
		$("#paceBox").css("visibility","visible");
		
		$("#paceBox").dialog({
			
			modal: true,
			buttons: [
			{
				text: "Steady",
				click: function() {
					// add in change pace info
					paceVal = 1;
					pace = "steady";
					
					$( this ).dialog( "close" );
					}
			},
			{
				text: "Strenuous",
				click: function() {
					// add in change pace info
					paceVal = 2;
					pace = "strenuous";
					$( this ).dialog( "close" );
					}
			},
			{
				text: "Grueling",
				click: function() {
					// add in change pace info
					paceVal = 3;
					pace = "grueling";
					$( this ).dialog( "close" );
					}
			}
			
			
			]
		});
	});
  
  
	$("#supplies").click(function(){
		$("#supplyBox").css("visibility","visible");
		//add way to show all supplies
		$("#supplyList").html("Oxen: " + window.oxen + " <br/> Clothing: " + clothing + " <br/> Bait: " + bait + " <br/> Wagon Wheels: " + wheels + " <br/> Wagon Axles: " + axles + " <br/> Wagon Tongues: " + tongues +"  <br/> Pounds of food: " + food + " <br/> Money left: $" + money);
		
		$("#supplyBox").dialog({
			
			modal: true,
			buttons: [
			{
				text: "Close",
				click: function() {
					
					$( this ).dialog( "close" );
					}
			}
			]
		});
	});
  
 
	$("#map").click(function(){
		$("#mapBox").css("visibility","visible");
		$("#mapBox").dialog({
			
			modal: true,
			buttons: [
			{
				text: "Close",
				click: function() {
					
					$( this ).dialog( "close" );
					}
			}
			]
		});
	});
  

	$("#rations").click(function(){
		$("#rationsBox").css("visibility","visible");
		
		$("#rationBox").dialog({	
			modal: true,
			buttons: [
			{
				text: "Bare Bones",
				click: function() {
					// Chnge food
					rationsVal = 1;
					rations = "bare bones";
					$( this ).dialog( "close" );
					}
			},
			{
				text: "Meager",
				click: function() {
					// Chnge food
					rationsVal = 2;
					rations = "meager";
					$( this ).dialog( "close" );
					}
			},
			{
				text: "Filling",
				click: function() {
					// Chnge food
					rationsVal = 3;
					rations = "filling";
					$( this ).dialog( "close" );
					}
			}
			]
		});
	});
  
  
  
  	$("#talk").click(function(){		
		$("#talking").html(talkin[randomNumber(0,10)]);
		$("#talkBox").css("visibility","visible");
		$("#talkBox").dialog({
			modal: true,
			buttons: [
			{
				text: "Quit",
				click: function() {
					
					$( this ).dialog( "close" );
					}
			}
			]
		});
	});
	
  
	
  
});


</script>

  </body>
</html>
