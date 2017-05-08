<?php
session_start();

$_SESSION["party"] = $_POST["partyIn"];
$_SESSION["stats"] = $_POST["statsIn"];
$_SESSION["money"] = $_POST["moneyIn"];
$_SESSION["oxen"] = $_POST["oxenIn"];
$_SESSION["food"] = $_POST["foodIn"];
$_SESSION["clothing"] = $_POST["clothingIn"];
$_SESSION["bait"] = $_POST["baitIn"];
$_SESSION["wheels"] = $_POST["wheelsIn"];
$_SESSION["axles"] = $_POST["axlesIn"];
$_SESSION["tongues"] = $_POST["tonguesIn"];

$_SESSION["date"] = $_POST["dateIn"];
$_SESSION["pace"] = $_POST["paceIn"];
$_SESSION["paceVal"] = $_POST["paceValIn"];
$_SESSION["rations"] = $_POST["rationsIn"];
$_SESSION["rationsVal"] = $_POST["rationsValIn"];
$_SESSION["health"] = $_POST["healthIn"];
$_SESSION["weather"] = $_POST["weatherIn"];
$_SESSION["weatherCode"] = $_POST["weatherCodeIn"];
$_SESSION["locale"] = $_POST["localeIn"];
$_SESSION["milesTraveled"] = $_POST["milesTraveledIn"];
$_SESSION["milesToNext"] = $_POST["milesToNextIn"];
$_SESSION["profession"] = $_POST["professionIn"];
$_SESSION["disease"] = $_POST["diseaseIn"];


$response = '';
echo $response;
