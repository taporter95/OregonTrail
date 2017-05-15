<?php
session_start();

if (isset($_POST['month'])){
$_SESSION["month"] = $_POST["month"];
}

?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT First Store</title>
	<link rel="stylesheet" href="style.css">
  </head>
  <body>

  <h1>Oregon Trail</h1>
  <p>
  Before leaving Independence you should by equipement and supplies. 
  <br>
  You have $<?php echo money_format("%i", $_SESSION["money"]);?> ,but you don't have to spend it all now.
  <br>
  You can buy whatever you need at Matt's general store.
  <br>
  Click below to head to the store!
  </p>
  <form name="info" action="genStore.php" method="post">
  <button type="submit">General Store</button>
  </form> 

  
  </body>
</html>
