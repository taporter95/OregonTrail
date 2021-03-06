<?php
/*
Beginning Page of the Game
Updates items bought from the store and adds
values to the session varaiables
reduces the money the player has by the items
bought. 

Initially accessed before starting the game
can be accessed again from the options menu
at towns.
*/
session_start();

//decrease money by the cost of items
$_SESSION["money"] = $_SESSION["money"] - $_SESSION["bill"];

//update the items the user has
$_SESSION["oxen"] = $_SESSION["oxen"] + $_SESSION["oxenBought"];
$_SESSION["food"] = $_SESSION["food"] + $_SESSION["foodBought"];
$_SESSION["clothing"] = $_SESSION["clothing"] + $_SESSION["clothingBought"];
$_SESSION["bait"] = $_SESSION["bait"] + $_SESSION["baitBought"];
$_SESSION["wheels"] = $_SESSION["wheels"] + $_SESSION["wheelsBought"];
$_SESSION["axles"] = $_SESSION["axles"] + $_SESSION["axlesBought"];
$_SESSION["tongues"] = $_SESSION["tongues"] + $_SESSION["tonguesBought"];


//clear the bought vars
$_SESSION["bill"] = 0;
$_SESSION["oxenBought"] = 0;
$_SESSION["foodBought"] =0;
$_SESSION["clothingBought"] =0;
$_SESSION["baitBought"] = 0;

$_SESSION["wheelsBought"] = 0;
$_SESSION["axlesBought"] = 0;
$_SESSION["tonguesBought"] = 0;

?>

<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Beginning</title>
	<link href="style.css" rel="stylesheet">
  </head>
  <body>

  <h1>Oregon Trail</h1>
  <p>Thanks for shopping! Your items have been bought.
  <br>
  Click Below to return to Options.
  </p>
  <form name="info" action="options.php" method="post">
  <button type="submit">Fort</button>
  </form>
    
  
  </body>
</html>
