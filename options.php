


<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Options</title>
  
  
  <!-- everything for my modal stuff -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="boxStyle.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="sessions.js"></script>
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
  
  
	$("#rest").click(function(){
		$("#restBox").css("visibility","visible");
		$("#restBox").dialog({
			modal: true,
			buttons: [
			{
				text: "Wait",
				click: function() {
					// make time pass, heal people, and the such
					for (var i = 0; i < $("#waiting").val(); i++){
						
						// ask how update Health works???
						updateHealth(true);
						
						date_obj.setDate(date_obj.getDate() + 1);
						day = date_obj.getDay();
						month = date_obj.getMonth();
						year = date_obj.getFullYear();
						food -= partySize * rationsVal;

					}
					updateWeather();
					$( this ).dialog( "close" );
					}
			}
			]
		});
	});
  
  
    
	$("#trade").click(function(){
		$("#tradeBox").css("visibility","visible");
		$("#tradeBox").dialog({

			modal: true,
			buttons: [
			{
				text: "Trade",
				click: function() {
					// trade items with whoever
					
					
					
					$( this ).dialog( "close" );
					}
			},
			{
				text: "Quit",
				click: function() {
					
					$( this ).dialog( "close" );
					}
			}
			]
		});
	});
  
  
  	$("#talk").click(function(){
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
	
	$("#shop").click(function(){
		$("#shopBox").css("visibility","visible");
		$("#shopBox").dialog({

			modal: true,
			buttons: [
			{
				text: "buy",
				click: function() {
					// buy things
					
					
					
					$( this ).dialog( "close" );
					}
			},
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
  
  
  
  
  </head>
  <body>
  


	<h1> Options </h1>
  <form name="info" action="game.php" method="post">
  <button type="submit" onclick="sendSession()">Game</button>
  </form>
    
	
  <form name="info" action="fish.php" method="post">
  <button type="submit" onclick="sendSession()">Fishing</button>
  </form>
  
  <form name="info" action="options.php" method="post">
  <button type="submit" onclick="sendSession()">  Reset </button>
  </form>
  

  <button id="pace">Change Pace</button>
  <button id="supplies">View Supplies</button>
  <button id="map">Show Map</button>
  <button id="rations">Change Rations</button>
  <button id="rest">Rest Up</button>
  <button id="trade">Trade with Locals</button>
  <!--<button id="help" onclick="startUp()">help</button>
  
  <!-- ADD IN IF IN TOWN THEN TALK TO PEOPLE??? -->
<?php
 
if (isset($_POST['fort'])){
 echo("<button id='talk' >Talk to Townsfolk</button>
  <button id='shop'>Shop from Town</button>");
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
  <p> Logic for trading here. Do you trade?</p>
</div>

<div id="talkBox" class="modalBox" title="Talking">
  <p> Decide what to say</p>
</div>

<div id="shopBox" class="modalBox" title="Shopping">
  <p> Buy shit or get out.</p>
</div>

<p onload="find()"> </p>


 
  
  </body>
</html>
