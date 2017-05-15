<?php
session_start();
$_SESSION["canBuy"] = 3 - $_SESSION["axles"];

?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Wagon axle</title>
  </head>
  <body>

  <h1>Wagon axle</h1>
  <p>It's a good idea to have a few spare parts. 
  <br>
  for your wagon. I sell axles for $10 each.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many axles do you want? (up to 3):
  <input type="number" name="axlesNum" min="0" max="<?php echo $_SESSION["canBuy"]?>" required>
  <br>
  <img src="images/wheel.png" alt="wheel" style="width:250px;height:250px;margin: 20px;">
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
