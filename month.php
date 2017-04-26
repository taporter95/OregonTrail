<?php
session_start();

$names = array($_POST["wagonleader"],$_POST["second"],$_POST["third"],$_POST["fourth"],$_POST["fifth"]);
$temp = array("Dorothy","Mary","Emily","Jed","Sara");

for($i = 0; $i < 5; $i++){
  if(empty($names[$i])){
    $names[$i] = $temp[$i];
  }
}


$_SESSION["wagonleader"] = $names[0];
$_SESSION["second"] = $names[1];
$_SESSION["third"] = $names[2];
$_SESSION["fourth"] = $names[3];
$_SESSION["fifth"] = $names[4];


?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Month</title>
  </head>
  <body>

  <h1> Month </h1>
  
  <p>
  It is 1848. Your jumping off
  <br>
  place for Oregon is Independence,
  <br>
  Missouri. You must decide which
  <br>
  month to leave Independence.
  <br>
  <br>
  1. March
  <br>
  2. April
  <br>
  3. May
  <br>
  4. June
  <br>
  5. July
  <br>
  <br>
  If you leave to early, there
  <br>
  won't be any grass for your
  <br>
  oxen to eat. If you leave too
  <br>
  late, you may not get to Oregon
  <br>
  before winter comes. If you
  <br>
  leave at just the right time,
  <br>
  there will be green grass and
  <br>
  the weather will still be cool
  <br>
  <br>
  </p>
  
  <form name="info" action="genStore.php" method="post">
  What is your choice? (between 1 and 5):
  <input type="number" name="quantity" min="1" max="5" required>
  <br>
  <button type="submit">Continue</button>
  </form>
    
  
  </body>
</html>
