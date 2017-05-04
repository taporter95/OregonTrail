<?php




?>

<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT River Option</title>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
   $( "#dialog" ).dialog({
  modal: true,
  buttons: [
    {
      text: "Ok",
      click: function() {
        $( this ).dialog( "close" );
      }
 
    }
  ]
});
  } );
  </script>
			
  </head>
  <body>
	<h1> River Option </h1>
	
	<div id="dialog" title="ImaBox"><p> Bow Wow wow
	
	
	</p></div>
	
	
  <form name="info" action="ferry.html" method="post">
  <button type="submit">Ferry</button>
  </form>

  <form name="info" action="crossing.html" method="post">
  <button type="submit">Crossing </button>
  </form>
  
  </body>
</html>
