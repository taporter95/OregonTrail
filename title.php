<?php

session_start();
session_destroy();
session_start();

$_SESSION["money"] = 0;
$_SESSION["oxen"] = 0;
$_SESSION["food"] = 0;
$_SESSION["clothing"] = 0;
$_SESSION["bait"] = 0;
$_SESSION["wheels"] = 0;
$_SESSION["axels"] = 0;
$_SESSION["tongues"] = 0;

$_SESSION["party"] = [];
$_SESSION["stats"] = ["good", "good", "good", "good", "good"];
$_SESSION["health"] = 0;
$_SESSION["date"] = date("Y/m/d");
$_SESSION["pace"] = "steady";
$_SESSION["paceVal"] = 1;
$_SESSION["rations"] = "filling";
$_SESSION["rationsVal"] = 3;
$_SESSION["weather"] = "warm";
$_SESSION["weatherCode"] = 4;
$_SESSION["locale"] = 0;

$_SESSION["milesToNext"] = 0;
$_SESSION["milesTraveled"] = 0;
$_SESSION["profession"] = 0;
$_SESSION["disease"] = ["none", "none", "none", "none", "none"];
$_SESSION["broken"] = false;
$_SESSION["inFort"] = false;

$_SESSION["oxenBought"] = 0;
$_SESSION["foodBought"] =0;
$_SESSION["clothingBought"] =0;
$_SESSION["baitBought"] = 0;
$_SESSION["wheelsBought"] = 0;
$_SESSION["axelsBought"] = 0;
$_SESSION["tonguesBought"] = 0;
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
  </head>
  <body>

	<h1> Titile </h1>
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
