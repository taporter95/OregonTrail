<?php
/*
Bait File for the Oregon Trail Game
This file is linked from the general store when a player
is attempting to buy bait. Bait is used in the fishing game
a replacement for hunting

The canBuy variable is the maximum amount of bait a player
can have subtracted from the amount of bait they already have.
The input is validated and the result is returned as a post
to the general store page.
The maximum amount of bait is 20 boxes.
*/
session_start();
$_SESSION["canBuy"] = 1980 - $_SESSION["bait"];

?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Bait</title>
  </head>
  <body>

  <h1> Bait </h1>
  <p>I sell fishing bait in boxes of 20 worms. 
  <br>
  Each worm costs $.10
  </p>
  <form name="info" action="genStore.php" method="post">
  How much bait do you want? (up to 1980):
  <input type="number" name="baitNum" min="0" max="<?php echo $_SESSION["canBuy"]?>" required>
  <br>
  <img src="images/bait.png" alt="bait" style="width:250px;height:250px;">
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
