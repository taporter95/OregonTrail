
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Game</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="sessions.js"> </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="trailFunctions.js"></script>
  </head>

  <body>

	<h1> Game </h1>

<label for="date">Date: </label>
<p id="date"></p> <br>
<label for="weather">Weather: </label>    
<p id="weather"></p> <br>
<label for="health">Health: </label>
<p id="health"></p> <br>
<label for="Food">Food: </label>
<p id="food"><p> <br>
<label for="next">Next landmark: </label>
<p id="next"></p> <br>
<label for="traveled">Miles traveled: </label>
<p id="traveled"></p> <br>


  <button id="continue" onclick="continueTrail()">Continue</button>
  
  <br>

  <form name="options" action="options.php" method="post">
  <button type="submit" onclick="sendSession()">Options</button>
  </form> 
	
  <form name="view" action="viewTerrain.html" method="post">
  <button type="submit">view Terrain</button>
  </form>
  
  <form name="river" action="riverInfo.html" method="post">
  <button type="submit">River info</button>
  </form>
  
  <form name="end" action="end.html" method="post">
  <button type="submit">End Game</button>
  </form>
  
  <!--
  <button id="geo"> Geo Event</button>
  <button id="rando"> Rando Event</button>
  <button id="grave"> Grave Event</button>
  <button id="divide"> Trail Divide</button>
  -->
  <div id="river_modal" class="modalBox" title="river"> 
    <p id="rm_text"></p>
    <form name="cross" action="riverOption.php" method="post">
      <button type="submit" onclick="sendSession()">Cross River</button>
    </form>
  </div>

  <div id="fort_modal" class="modalBox" title="fort">
    <p id="fm_text"></p>
    <form name="cross" action="options.php" method="post">
      <button type="submit" onclick="sendSession()">Go to Fort</button>
    </form>
  </div>

  <div id="alert" class="modalBox" title="alert">
    <p id="alert_text"></p>
  </div>

   
    <script type="text/javascript">

      $(document).ready(function(){
      	var date_obj = new Date(year, month, day);
        update_display();
      });
    </script>
  </body>

  
</html>
