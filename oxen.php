<?php
session_start();
$_SESSION["canBuy"] = 9 - $_SESSION["oxen"];

?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Oxen</title>
  </head>
  <body>

  <h1> Oxen </h1>
  <p>There are two oxen in a yoke.
  <br>
  I recommend at least 3 yoke.
  <br>
  I charge $40 a yoke.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many yoke do you want? (up to 9):
  <input type="number" name="oxenNum" min="0" max="<?php echo $_SESSION["canBuy"]?>" required>
  <br>
  <img src="images/ox.png" alt="oxen" style="width:250px;height:300px;margin: 20px;">
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
