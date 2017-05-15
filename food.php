<?php
session_start();
$_SESSION["canBuy"] = 2000 - $_SESSION["food"];

?>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Food</title>
  </head>
  <body>

  <h1> Food </h1>
  <p> I recommend you take at least 200 pounds of food for each person in your family.
  <br>
  I see that you have 5 people in all. You'll need flour, sugar, bacon, and
  <br>
  coffee. My price is 20 cents a pound.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many pounds of food do you want? (up to 2000):
  <input type="number" name="foodNum" min="0" max="<?php echo $_SESSION["canBuy"]?>" required>
  <br>
  <img src="images/food.png" alt="food" style="width:627px;height:250px;margin: 20px;">
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
