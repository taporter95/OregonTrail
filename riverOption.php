<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT River Option</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script type="text/javascript" src="sessions.js"></script> 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="boxStyle.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="style.css">
			
  </head>
  <body>
	<h1> River Option </h1>

  <form name="crossForm" id="crossForm" action="crossing.php" method="post">
  
  <input type="hidden" name="depth" id="depth" >
  
	<input id="choose1" onclick="sendSession()" type="submit" name="choice" value="ford">
    <input id="choose2" onclick="sendSession()" type="submit" name="choice" value="caulk">
	<input id="choose3" onclick="sendSession()" type="submit" name="choice" value="ferry">
 
  </form>
  
  <button id="wait" onclick="wait()"> Wait</button>
  
  <button id="info"> River Information</button>
  
  <div id="infoBox" >
	<p id="riverInfo"> </p>
	</div>
  
  <div id="waitBox" class="modalBox" title="Resting">
  <p> How long would you like to wait? </p>
  
 <input type="number" id="waiting" min="0" value="0">
  
</div>
  
<script type="text/javascript" src="trailFunctions.js"> </script>
<script>
	var riverWidth = randomNumber(400, 600);
	var riverDepth = parseFloat((Math.random() * (10 - 2) + 2).toFixed(1));
</script>
  
  
 <script>
  $( function() {
	 
  
	$("#info").click(function(){
		$("#infoBox").css("visibility","visible");
		var msg = "";
		if (locale > 3){
			msg = "<br/> Native's Guidance Fee: 3 clothes";
		}
		else{
			msg = "<br/> Ferry Fee: 5 dollars";
		}
		
		$("#riverInfo").html (
		"Weather: " + weather +
		"<br/>River Width: " + riverWidth +
		"<br/>River Depth: " + riverDepth + msg);
		
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
  
  
  $("#choose1").click(function(){
	  $("#depth").val(riverDepth); 
  });
  
    $("#choose2").click(function(){
	  $("#depth").val(riverDepth); 
  });
  
    $("#choose3").click(function(){
	  $("#depth").val(riverDepth); 
  });
  
  $("#crossForm").submit(function(event){
	 if ((locale > 3) && (clothing < 3) && ($("#choose3") == "ferry") ){
		alert("You do not have enough clothes for the fee. Choose another option.");
		event.preventDefault();
	}
	else if ((locale < 3) && (money < 5) &&  ($("#choose3") == "ferry")){
		alert("You do not have enough money for the ferry. Choose another option.");
		event.preventDefault();
	}
	else{
		return true;
	}
	
	console.log("Help I shouldn't get here on submit");

  });
  
  } );
  </script>
  </body>
</html>
