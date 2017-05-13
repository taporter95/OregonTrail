<?php
session_start();


$_SESSION["party"] = $_REQUEST["partyIn"];
$_SESSION["stats"] = $_REQUEST["statsIn"];
$_SESSION["money"] = $_REQUEST["moneyIn"];
$_SESSION["oxen"] = $_REQUEST["oxenIn"];
$_SESSION["food"] = $_REQUEST["foodIn"];
$_SESSION["clothing"] = $_REQUEST["clothingIn"];
$_SESSION["bait"] = $_REQUEST["baitIn"];
$_SESSION["wheels"] = $_REQUEST["wheelsIn"];
$_SESSION["axles"] = $_REQUEST["axlesIn"];
$_SESSION["tongues"] = $_REQUEST["tonguesIn"];

$_SESSION["date"] = $_REQUEST["dateIn"];
$_SESSION["pace"] = $_REQUEST["paceIn"];
$_SESSION["paceVal"] = $_REQUEST["paceValIn"];
$_SESSION["rations"] = $_REQUEST["rationsIn"];
$_SESSION["rationsVal"] = $_REQUEST["rationsValIn"];
$_SESSION["health"] = $_REQUEST["healthIn"];
$_SESSION["weather"] = $_REQUEST["weatherIn"];
$_SESSION["weatherCode"] = $_REQUEST["weatherCodeIn"];
$_SESSION["locale"] = $_REQUEST["localeIn"];
$_SESSION["milesTraveled"] = $_REQUEST["milesTraveledIn"];
$_SESSION["milesToNext"] = $_REQUEST["milesToNextIn"];
$_SESSION["profession"] = $_REQUEST["professionIn"];
$_SESSION["disease"] = $_REQUEST["diseaseIn"];
$_SESSION["partySize"] = $_REQUEST["partySizeIn"];
$_SESSION["monthV"] = $_REQUEST["monthVIn"];
$_SESSION["dayV"] = $_REQUEST["dayVIn"];
$_SESSION["yearV"] = $_REQUEST["yearVIn"];

$response = $_REQUEST["locale"];
echo $response;
