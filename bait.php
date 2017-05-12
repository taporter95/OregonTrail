<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Bait</title>
  </head>
  <body>

  <h1> Bait </h1>
  <p>I sell fishing bait in boxes of 20 worms. 
  <br>
  Each box costs $2.00.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many boxes do you want? (up to 99):
  <input type="number" name="baitNum" min="0" max="99" required>
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
