<?php
session_start();

$_SESSION["money"] = 200;
$_SESSION["oxen"] = 2;
$_SESSION["food"] = 4300;
$_SESSION["clothing"] = 20;
$_SESSION["bait"] = 50;
$_SESSION["wheels"] = 1;
$_SESSION["axles"] = 0;
$_SESSION["tongues"] = 2;

$_SESSION["party"] = 200;
$_SESSION["stats"] = 2;
$_SESSION["date"] = 4300;
$_SESSION["pace"] = 20;
$_SESSION["paceVal"] = 50;
$_SESSION["rations"] = 1;
$_SESSION["rationsVal"] = 0;
$_SESSION["health"] = 2;

$_SESSION["weather"] = 200;
$_SESSION["weatherCode"] = 2;
$_SESSION["locale"] = 0;
$_SESSION["milesTraveled"] = 20;
$_SESSION["milesToNext"] = 50;
$_SESSION["profession"] = 1;
$_SESSION["disease"] = 1;


?>

<html>
<body>
<?php  echo $_SESSION["money"];?>
 <form name="info" action="options.php" method="post">
  <button type="submit">Go </button>

</body>
</html>