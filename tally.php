<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Tally</title>
  </head>
  <body>

	<h1> Point Tally </h1>
	<?php
  $db = mysqli_connect("studentdb-maria.gl.umbc.edu","kurts1","kurts1","kurts1");

if (mysqli_connect_errno())
	exit("Halp! Could not connect to MySQL");
  
  
  $personScoring = [200, 300, 400, 500];
  
  
  $moneyPoints = $_SESSION["money"] / 5;
  $wagonPoints = 50;
  $oxPoints = $_SESSION["oxen"] *4 ;
  $partsPoints =( $_SESSION["parts"][0] + $_SESSION["parts"][1] + $_SESSION["parts"][3]) *2 ;
  $clothesPoints = $_SESSION["clothes"] * 2;
  $baitPoints = $_SESSION["bait"] / 50;
  $foodPoints = $_SESSION["food"] / 30 ;
  $humanPoints = personScoring[[$_SESSION["statusCode"][0]] + personScoring[[$_SESSION["statusCode"][1]] + personScoring[[$_SESSION["statusCode"][2]] + personScoring[[$_SESSION["statusCode"][3]] + personScoring[[$_SESSION["statusCode"][4]];
  
  
  $name = $_SESSION["party"][0];
  $score = $moneyPoints + $wagonPoints + $oxPoints + $partsPoints + $clothesPoints + $baitPoints + $foodPoints + $humanPoints;
  
  $insertQuery = "insert into topTen(screenName, score) values ($name, $score);";
$result = mysqli_query($db, $insertQuery);
  
  if(! $result){
print("Error - query could not be executed");
$error = mysqli_error();
print "<p> . $error . </p>";
exit;
}
  
?>

  <form name="info" action="topTen.php" method="post">
  <button type="submit">topTen</button>
  </form> 

  
  </body>
</html>
