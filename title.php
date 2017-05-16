<?php
/*
The start page of the Oregon Trail game
Allows the player to start an Oregon Trail playthrough
Also links to the high score page and the info page
*/
session_start();
session_destroy();
session_start();

$_SESSION["money"] = 0; //money the player has
$_SESSION["oxen"] = 0; //oxen the player owns
$_SESSION["food"] = 0; //food the player owns
$_SESSION["clothing"] = 0; //pairs of clothing the player owns
$_SESSION["bait"] = 0; //bait the player owns
$_SESSION["wheels"] = 0; //spare wheels the player owns
$_SESSION["axles"] = 0; //spare axles the player owns
$_SESSION["tongues"] = 0; //spare tongues the player owns

$_SESSION["party"] = []; //names of members of the party
$_SESSION["stats"] = [10, 10, 10, 10, 10]; //health values of each party member, healthy = 10, dead = 0
$_SESSION["health"] = "good"; //average health of the party
$_SESSION["date"] = date("Y/m/d"); //todays date 
$_SESSION["pace"] = "steady"; //string value of pace
$_SESSION["paceVal"] = 1; // used for calculating how fast the player moves
$_SESSION["rations"] = "filling"; //string value of rations
$_SESSION["rationsVal"] = 3; //used for calculating how much food the party eats per day
$_SESSION["weather"] = "warm"; //string value of the weather
$_SESSION["weatherCode"] = 4; //used for indexing
$_SESSION["locale"] = 0; //overal location in the game, used for indexing

$_SESSION["milesToNext"] = 0; //number of miles to the next location
$_SESSION["milesTraveled"] = 0; //total number of miles traveled
$_SESSION["profession"] = 0; //the difficulty level of the game
$_SESSION["disease"] = ["none", "none", "none", "none", "none"]; //keeps track of diseases that each party member has
$_SESSION["inFort"] = false; //is the party in a fort
$_SESSION["partySize"] = 5; //the size of the party, game ends if this reaches 0
$_SESSION["month"] = 2; //month in game time
$_SESSION["day"] = 1; //day in game time
$_SESSION["year"] = 1848; //year in game time
$_SESSION["broken"] = 0; //is the wagon broken
$_SESSION["split"] = 0; //is the path splitting

$_SESSION["oxenBought"] = 0; //how many oxen the player buys
$_SESSION["foodBought"] =0; //how much food the player buys
$_SESSION["clothingBought"] =0; //how much clothing the player buys
$_SESSION["baitBought"] = 0; //how much bait the player buys
$_SESSION["wheelsBought"] = 0; //how many wheels the player buys
$_SESSION["axlesBought"] = 0; //how many axles the player buys
$_SESSION["tonguesBought"] = 0; //how many tongues the player buys
?>


<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Title</title>
    <script src="https://ajax.oogleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="sessions.js"> </script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

	<h1> Oregon Trail</h1>
  <form name="info" action="profession.php" method="post">
  <button type="submit" onclick="sendSession()">Profession </button>
  </form>
    
  <form name="info" action="topTen.php" method="post">
  <button type="submit">Top Ten </button>
  </form>
  
  <form name="info" action="trailInfo.php" method="post">
  <button type="submit"> Trail info </button>
  </form>
  
  </body>
</html>
