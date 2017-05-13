<?php
session_start();


$response = json_encode(array(json_encode($_SESSION["party"]), json_encode($_SESSION["stats"]), $_SESSION["money"], 
$_SESSION["oxen"], $_SESSION["food"],$_SESSION["clothing"], $_SESSION["bait"], 
$_SESSION["wheels"],$_SESSION["axles"], $_SESSION["tongues"], $_SESSION["date"], $_SESSION["pace"], 
$_SESSION["paceVal"], $_SESSION["rations"], $_SESSION["rationsVal"], 
$_SESSION["health"], $_SESSION["weather"], $_SESSION["weatherCode"], 
$_SESSION["locale"], $_SESSION["milesTraveled"], $_SESSION["milesToNext"], $_SESSION["profession"], json_encode($_SESSION["disease"]), $_SESSION["partySize"], $_SESSION["monthV"], $_SESSION["dayV"], $_SESSION["yearV"]));

echo ($response);
