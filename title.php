<?php

session_start();
session_destroy();
session_start();

?>

<?php xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Title</title>
  </head>
  <body>

	<h1> Titile </h1>
  <form name="info" action="profession.php" method="post">
  <button type="submit">Profession </button>
  </form>
    
  <form name="info" action="topTen.php" method="post">
  <button type="submit">Top Ten </button>
  </form>
  
  <form name="info" action="trailInfo.php" method="post">
  <button type="submit"> Trail info </button>
  </form>
  
  </body>
</html>
