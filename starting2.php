<?php
session_start();

$_SESSION["money"] = 500;
$_SESSION["oxen"] = 18;
$_SESSION["food"] = 2000;
$_SESSION["clothing"] = 50;
$_SESSION["bait"] = 50;
$_SESSION["wheels"] = 3;
$_SESSION["axles"] = 3;
$_SESSION["tongues"] = 3;
$_SESSION["party"] = ["a", "b", "c", "d", "e"];
$_SESSION["stats"] = ["good", "good", "good", "good", "good"];
$_SESSION["health"] = "good";
$_SESSION["date"] = date("Y/m/d");
$_SESSION["pace"] = "steady";
$_SESSION["paceVal"] = 1;
$_SESSION["rations"] = "filling";
$_SESSION["rationsVal"] = 3;
$_SESSION["weather"] = "warm";
$_SESSION["weatherCode"] = 4;
$_SESSION["locale"] = 0;
$_SESSION["inFort"] = false;
$_SESSION["milesToNext"] = 0;
$_SESSION["milesTraveled"] = 0;
$_SESSION["profession"] = 0;
$_SESSION["disease"] = ["none", "none", "none", "none", "none"];
$_SESSION["broken"] = false;
$_SESSION["partySize"] = 5;
$_SESSION["monthVal"] = 2;
$_SESSION["dayVal"] = 1;
$_SESSION["yearVal"] = 1848;

?>

<html>
<body>
<?php  echo $_SESSION["money"];?>
 <form name="info" action="game.php" method="post">
  <button type="submit">Go </button>

</body>
</html>