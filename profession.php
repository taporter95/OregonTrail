<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Profession</title>
    <script type="text/javascript" src="sessions.js"> </script>
  </head>
  <body>
<?php
/*
Profession File for the Oregon Trail Game
This file is use to determine the profession of the player.

The player chooses 1 2 or 3 corresponding to banker carpenter
or farmer. This effects the money they start with and the end score

This is sent as a post and updated on the next page.
*/  
session_start();
?>
  <h1> Profession </h1>
  <p>Many kinds of people made the trip to Oregon.
  <br>
  Traveling to Oregon isn't easy!
  <br>
  But if you're a banker you'll have more money for supplies
  <br>
  and sevices than a carpenter
  <br>
  or a farmer.
  <br>
  <br>
  However, the harder you have
  <br>
  to try, the more points you
  <br>
  deserve! Therefore, the
  <br>
  farmer earns the greatest
  <br>
  number of points and the 
  <br>
  banker earns the least
  <br>
  <br>
  You may:
  <br>
  1. Be a banker from Oregon (Easy)
  <br>
  2. Be a carpenter from Ohio (Normal)
  <br>
  3. Be a farmer from Illinois (Hard)
  </p> 
 
  <form name="info" action="names.php" method="post">
  What is your choice? (between 1 and 3):
  <input type="number" name="quantity" min="1" max="3" required>
  <br>
  <button type="submit" onclick="sendSession()">Continue</button>
  </form>
    
  
  </body>
</html>

