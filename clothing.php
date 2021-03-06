<?php
/*
Clothing File for the Oregon Trail Game
This file is linked from the general store when a player
is attempting to buy clothing.
The canBuy variable is the maximum amount of clothing a player
can have subtracted from the amount of clothing they already have.
The input is validated and the result is returned as a post
to the general store page.

The maximum amount of clothing is 99 sets.
*/
session_start();
$_SESSION["canBuy"] = 99 - $_SESSION["clothing"];

?>

<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Clothing</title>
  </head>
  <body>

  <h1> Clothing </h1>
  <p>You'll need warm clothing in the Mountain.
  <br>
  I recommend taking at least two sets of clothes per person.
  <br>
  Each set is $10.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many sets of clothes do you want? (up to 99):
  <input type="number" name="clothingNum" min="0" max="<?php echo $_SESSION["canBuy"]?>" required>
  <br>
  <img src="images/boots.png" alt="boots" style="width:200px;height:200px;">
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
