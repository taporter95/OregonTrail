
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
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
  </head>

  <body>

	<h1> Game </h1>

<table>
  <tr>
    <td>Date: </td>
    <td id="date"></td>
  </tr>
  <tr>
    <td>Weather: </td>
    <td id="weather"></td>
  </tr>
  <tr>
    <td>Health: </td>
    <td id="health"></td>
  </tr>
  <tr>
    <td>Food: </td>
    <td id="food"></td>
  </tr>
  <tr>
    <td>Next landmark: </td>
    <td id="next"></td>
  </tr>
  <tr>
    <td>Miles traveled: </td>
    <td id="traveled"></td>
  </tr>
</table>

  <button id="continue" onclick="continueTrail()">Continue</button>
  
  <br>

  <form name="options" action="options.php" method="post">
    <button type="submit" onclick="sendSession()">Options</button>
  </form> 
  
  
  <div id="game_over_modal" class="modalBox" title="Game Over, Everyone Is Dead"> 
    <img id="skull" style="height: 200px; width: 250px; visibility: hidden;"/>
    <form id="game_over_form" name="gameOver" action="gameOver.php" method="post">
      <button id="game_over_button" type="submit" style="visibility: hidden;" onclick="sendSession()">game over</button>
    </form>
  </div>

  <div id="river_modal" class="modalBox" title="River Crossing"> 
    <p id="rm_text"></p>
    <img id="river_image" style="height: 200px; width: 250px; visibility: hidden;"/>
    <form id="river_form" name="cross" action="riverOption.php" method="post">
      <button id="river_button" type="submit" style="visibility: hidden;" onclick="sendSession()">Cross River</button>
    </form>
  </div>

  <div id="fort_modal" class="modalBox" title="Fort">
    <p id="fm_text"></p>
    <img id="fort_image" visible="hidden" style="height: 200px; width: 250px; visibility: hidden;"/>
    <form id="fort_form" name="options" action="options.php" method="post">
      <button id="fort_button" type="submit" style="visibility: hidden;" name="fort" onclick="sendSession()">Go to Fort</button>
    </form>
  </div>

  <div id="end_game" class="modalBox" title="Almost There!">
    <p id="end_game_text"></p>
    <form id="end_game_form" name="minigame" action="miniGame.html" method="post">
      <button id="take_river_button" type="submit" style="visibility: hidden;" name="end" onclick="sendSession()">Go to game</button>
    </form>
  </div>

  <div id="game_win" class="modalBox" title="You Made it to Oregon!">
    <img id="valley" visible="hidden" style="height: 200px; width: 250px; visibility: hidden;"/>
    <form id="game_win_form" name="end" action="end.php" method="post">
      <button id="game_win_button" type="submit" style="visibility: hidden;" name="win" onclick="sendSession()">Go to game</button>
    </form>
  </div>

  <div id="tradeBox" class="modalBox" title="Trading">
    <p id="trade_string"></p>
    <input type="hidden" id="q_for">
    <input type="hidden" id="i_for">
    <input type="hidden" id="q_to">
    <input type="hidden" id="i_to">
  </div>

  <div id="broken_wagon_1" class="modalBox" title="Broken Wagon">
    <p id="broken_wagon_text_1"></p>
  </div>

  <div id="broken_wagon_2" class="modalBox" title="Broken Wagon">
    <p id="broken_wagon_text_2"></p>
  </div>

  <div id="split_trail" class="modalBox" title="Trail Splits">
    <p id="split_trail_text"></p>
  </div>

  <div id="alert" class="modalBox" title="alert">
    <p id="alert_text"></p>
  </div>

   	<script type="text/javascript" src="trailFunctions.js" defer></script>
    <script type="text/javascript">
      $(document).ready(function(){
        update_display();
      });
    </script>
  </body>

  
</html>
