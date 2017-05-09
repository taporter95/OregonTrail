<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT River Option</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="boxStyle.css">
 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  var riverWidth = randomNumber(400, 600);
	var riverDepth = parseFloat((Math.random() * (6 - 2) + 2).toFixed(1));
  $( function() {
	 

  	$("#wait").click(function(){
		$("#waitBox").css("visibility","visible");
		$("#waitBox").dialog({
			modal: true,
			buttons: [
			{
				text: "Wait",
				click: function() {
					// make time pass, heal people, and the such
					for (var i = 0; i < $("#waiting").val(); i++){
						
						// ask how update Health works???
						
						
						// ?????
						
						
						//updtae dtae
					}
					//update weather
					$( this ).dialog( "close" );
					}
			}
			]
		});
	});
  
	$("#info").click(function(){
		$("#infoBox").css("visibility","visible");
		$("#riverInfo").innerHTML = (
		"Weather: " + weather +
		"River Width: " + riverWidth +
		"River Depth: " + riverDepth;
		
		$("#infoBox").dialog({
			
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
  
  
  } );
  </script>
			
  </head>
  <body>
	<h1> River Option </h1>
	
	
  <form name="info" action="ferry.html" method="post">
  <button type="submit">Ferry</button>
  </form>

  <form name="info" action="crossing.html" method="post">
  <button type="submit">Crossing </button>
  </form>
  
  <button id="wait"> Wait</button>
  
  <button id="info"> River Information</button>
  
  <div id="infoBox" >
	<p id="riverInfo"> </p>
	</div>
  
  <div id="waitBox" class="modalBox" title="Resting">
  <p> How long would you like to wait? </p>
  
  <input id="waiting" type="upDownSpinnner" > <p> Days </p>
  
</div>
  
  
  </body>
</html>
