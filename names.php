<?php
session_start();
//profession
$_SESSION["profession"] = $_POST["quantity"];

//$_SESSION["money"] = -100;
//echo $_SESSION["money"];

if ($_SESSION["profession"] == 1) {
	$_SESSION["money"] = 1600;
	echo $_SESSION["money"];
}
else if($_SESSION["profession"] == 2) {
	$_SESSION["money"] = 800;
	echo $_SESSION["money"];
}
else if($_SESSION["profession"] == 3) {
	$_SESSION["money"] = 400;
	echo $_SESSION["money"];
}
else{
	//this shouldnt happen
	echo "wrong";
}

?>

<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Names</title>
    <script type="text/javascript" src="sessions.js"> </script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

	<h1> Names </h1>
	      <img src="images/wagon.png">
	<p>What are the first names of the members of your party?</p>
  <form name="info" action="month.php" method="post">
	1. <input type="text" name="wagonleader" value="">
  <br>
  	2. <input type="text" name="second" value="">
  <br>
  	3. <input type="text" name="third" value="">
  <br>
  	4. <input type="text" name="fourth" value="">
  <br>
  	5. <input type="text" name="fifth" value="">
  <br>
  <br>
  <button type="submit" onclick="sendSession()">Month</button>
  </form>
    
  
  </body>
</html>
