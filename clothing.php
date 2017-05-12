<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Clothing</title>
  </head>
  <body>

  <h1> Clothing </h1>
  <p>You'll need warm clothing in the Mountain.
  <br>
  I recommend taking at least two sets of clothes per person.
  <br>
  Each set is $10.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many sets of clothes do you want? (up to 99):
  <input type="number" name="clothingNum" min="0" max="99" required>
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
