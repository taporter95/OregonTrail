<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT Info</title>
		<link rel="stylesheet" href="style.css">
  </head>
  <body>

	<h1> Top Ten </h1>
	<?php

$db = mysqli_connect("studentdb-maria.gl.umbc.edu","kurts1","kurts1","kurts1");

if (mysqli_connect_errno())
	exit("Halp! Could not connect to MySQL");
	
$selectQuery = "SELECT screenName, score FROM topTen order by score DESC;";
$result = mysqli_query($db, $selectQuery);
	
if(! $result){
print("Error - query could not be executed");
$error = mysqli_error();
print "<p> . $error . </p>";
exit;
}

$num_rows = mysqli_num_rows($result);
print("<ol>");
for($row_num = 1; $row_num <= 10; $row_num++){
	if ($num_rows >=$row_num){
		$row_array = mysqli_fetch_array($result);
		print("<li>$row_array[screenName] : $row_array[score] </li>");
	}
	else{
	print ("<li> </li>");
	}
}
print("</ol>");	

?>
  <form name="info" action="title.php" method="post">
  <button type="submit">Title </button>
  </form>
    
  
  </body>
</html>
