<?php
/*
Oxen File for the Oregon Trail Game
This file is linked from the general store when a player
is attempting to buy oxen.

The canBuy variable is the maximum amount of oxen a player
can have subtracted from the amount of oxen they already own.
The input is validated and the result is returned as a post
to the general store page.
*/
session_start();
$_SESSION["canBuy"] = 18 - $_SESSION["oxen"];

?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Oxen</title>
  </head>
  <body>

  <h1> Oxen </h1>
  <p>There are two oxen in a yoke.
  <br>
  I recommend at least 3 yoke or 6 oxen.
  <br>
  I charge $20 per oxen.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many yoke do you want? (up to 18):
  <input type="number" name="oxenNum" min="0" max="<?php echo $_SESSION["canBuy"]?>" required>
  <br>
  <img src="images/ox.png" alt="oxen" style="width:250px;height:300px;margin: 20px;">
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
