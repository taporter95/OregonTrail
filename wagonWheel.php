<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<link href="style.css" rel="stylesheet">
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Wagon Wheel</title>
  </head>
  <body>

  <h1>Wagon Wheel</h1>
  <p>It's a good idea to have a few spare parts. 
  <br>
  for your wagon. I sell wheels for $10 each.
  </p>
  <form name="info" action="genStore.php" method="post">
  How many wheels do you want? (up to 3):
  <input type="number" name="wheelsNum" min="0" max="3" required>
  <br>
  <button type="submit">Back to Store</button>
  </form>
    
  
  </body>
</html>
