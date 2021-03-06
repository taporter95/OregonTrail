<?php
/*
Food File for the Oregon Trail Game
This file is linked from the general store when a player
is attempting to buy food.

The canBuy variable is the maximum amount of food a player
can have subtracted from the amount of food they already have.
The input is validated and the result is returned as a post
to the general store page.

The maximum amount of food is 2000 lbs.
*/
session_start();
$_SESSION["canBuy"] = 2000 - $_SESSION["food"];

?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Food</title>
  </head>
  <body>

  <h1> Food </h1>
  <p> I recommend you take at least 200 pounds of food for each person in your family.
  <br>
  I see that you have 5 people in all. You'll need flour, sugar, bacon, and
  <br>
  coffee. My price is 20 cents a pound.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many pounds of food do you want? (up to 2000):
  <input type="number" name="foodNum" min="0" max="<?php echo $_SESSION["canBuy"]?>" required>
  <br>
  <img src="images/food.png" alt="food" style="width:350px;height:250px;">
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
