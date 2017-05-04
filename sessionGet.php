<?php

$response = array($_SESSION["party"], $_SESSION["stats"], $_SESSION["money"], 
$_SESSION["oxen"], $_SESSION["food"],$_SESSION["clothing"], $_SESSION["hooks"], 
$_SESSION["wheels"],$_SESSION["axles"], $_SESSION["date"], $_SESSION["pace"], 
$_SESSION["paceVal"], $_SESSION["rations"], $_SESSION["rationsVal"], 
$_SESSION["health"], $_SESSION["weather"], $_SESSION["weatherCode"], 
$_SESSION["locale"], $_SESSION["milesTraveled"], $_SESSION["milesToNext"]);

echo $response;
