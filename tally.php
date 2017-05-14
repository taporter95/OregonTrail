<?php session_start(); ?>

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
  
  
  $personScoring = array(0, 100, 100, 100, 200, 200, 300, 300, 400, 400, 500);
  
  $stats = $_SESSION["stats"];
  
  $moneyPoints = round( $_SESSION["money"] / 5);
  $wagonPoints = 50;
  $oxPoints = $_SESSION["oxen"] *4 ;
  $partsPoints =( $_SESSION["wheels"] + $_SESSION["axles"]+ $_SESSION["tongues"]) *2 ;
  $clothesPoints = $_SESSION["clothing"] * 2;
  $baitPoints = round($_SESSION["bait"] / 50);
  $foodPoints = round($_SESSION["food"] / 30 );
  $humanPoints = $personScoring[$stats[0]] + $personScoring[$stats[1]] + $personScoring[$stats[2]] + $personScoring[$stats[3]] + $personScoring[$stats[4]];
  
  
  $name = $_SESSION["party"][0];
  $score = $moneyPoints + $wagonPoints + $oxPoints + $partsPoints + $clothesPoints + $baitPoints + $foodPoints + $humanPoints;
  
  
  echo("For Player $name: <br/>
  Money: $moneyPoints Points<br/>
  Wagon: $wagonPoints Points<br/>
  Oxen: $oxPoints Points<br/>
  Spare Parts: $partsPoints Points<br/>
  Clothing: $clothesPoints Points<br/>
  Bait: $baitPoints Points<br/>
  Food: $foodPoints Points<br/>
  Ending Health: $humanPoints Points<br/>
  Total Points: $score <br/>
  ");
  
  $insertQuery = "insert into topTen(screenName, score) values ('$name', $score);";
$result = mysqli_query($db, $insertQuery);
  
  if(! $result){
	print("Error - query could not be executed");
	$error = mysqli_error($db);
	print "<p> . $error . </p>";
	exit;
	}
  
?>

  <form name="info" action="topTen.php" method="post">
  <button type="submit">topTen</button>
  </form> 

  
  </body>
</html>
