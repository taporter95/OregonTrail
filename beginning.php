<?php
session_start();
//echo $_SESSION["money"] . "<br />\n";

$_SESSION["money"] = $_SESSION["money"] - $_SESSION["bill"];

$_SESSION["oxen"] = $_SESSION["oxen"] + $_SESSION["oxenBought"];
$_SESSION["food"] = $_SESSION["food"] + $_SESSION["foodBought"];
$_SESSION["clothing"] = $_SESSION["clothing"] + $_SESSION["clothingBought"];
$_SESSION["bait"] = $_SESSION["bait"] + $_SESSION["baitBought"];


//clear the bought vars
$_SESSION["bill"] = 0;
$_SESSION["oxenBought"] = 0;
$_SESSION["foodBought"] =0;
$_SESSION["clothingBought"] =0;
$_SESSION["baitBought"] = 0;

/*
echo $_SESSION["oxen"] . "<br />\n";
echo $_SESSION["food"] . "<br />\n";
echo $_SESSION["clothing"] . "<br />\n";
echo $_SESSION["bait"] . "<br />\n";
*/
?>

<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Beginning</title>
  </head>
  <body>

  <h1>Beginning</h1>
  <p>Well then you're ready to start. Good Luck!
  <br>
  You have a long and difficult journey ahead of you.
  </p>
  <form name="info" action="options.php" method="post">
  <button type="submit">Options</button>
  </form>
    
  
  </body>
</html>