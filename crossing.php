
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!-- dynamic.html 
 -->
<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT River Crossing</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="sessions.js"></script> 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="trailFunctions.js"></script>
	<link rel="stylesheet" href="style.css">
	  	<script type="text/javascript" src="trailFunctions.js"></script>

  </head>
  <body>

	<h1> River Crossing </h1>

	<?php 
	session_start();

	$deep = $_POST["depth"];
	$chose = $_POST["choice"];
	$msg = "";
	$chance = rand(0,100);
	
	if (($chose == "ford") && ($deep <= 2.5)){
		$msg .= "You crossed fine<br/>";
	}
	elseif (($chose == "ford") && ($deep <= 6)){
		if ($chance < 50){
			//ruin player's life if they get unlucky
			$msg.= "Your wagon tipped over <br/>";
			
			$msg .= "You lost ".ceil($_SESSION['oxen']/3). "oxen<br/>";			
			$_SESSION["oxen"] = floor( $_SESSION["oxen"]*2/3);
			
			$msg .= "You lost ".ceil($_SESSION['food']/3). "food<br/>";			
			$_SESSION["food"] = floor( $_SESSION["food"]*2/3);
			
			$msg .= "You lost ".ceil($_SESSION['clothing']/3). " clothes<br/>";			
			$_SESSION["clothing"] = floor( $_SESSION["clothing"]*2/3);
			
			$msg .= "You lost ".ceil($_SESSION['bait']/3). " bait<br/>";			
			$_SESSION["bait"] = floor( $_SESSION["bait"]*2/3);
			
			$msg .= "You lost ".ceil($_SESSION['wheels']/3). "wheels<br/>";			
			$_SESSION["wheels"] = floor( $_SESSION["wheels"]*2/3);
			
			$msg .= "You lost ".ceil($_SESSION['axles']/3). "axles<br/>";			
			$_SESSION["axles"] = floor( $_SESSION["axles"]*2/3);
			
			$msg .= "You lost ".ceil($_SESSION['tongues']/3). "tongues<br/>";			
			$_SESSION["tongues"] = floor( $_SESSION["tongues"]*2/3);
						
			$msg .= "You lost ".ceil($_SESSION['money']/3). "money<br/>";			
			$_SESSION["money"] =floor( $_SESSION["money"]*2/3);
			
		}
		else{
			$msg .= "You crossed fine<br/>";
		}
	}
	elseif (($chose == "ford") && ($deep > 6)){
		//kill them all
		for ($i = 0; $i < $_SESSION["partySize"]; $i++){
			$msg .= $_SESSION["party"][$i]." has died.<br/>";
			$_SESSION["stats"][$i] = 0;
		}
		$_SESSION["partySize"] = 0;
		echo ("<script>");
		echo ("alert('Everyone died in the deep river.');");
		echo ("window.location.replace('gameOver.php');");
		echo ("</script>");
		
	}
	
	elseif (($chose == "caulk") && ($deep <= 2.5)){
		
		if ($chance < 60){
			$msg.= "Your wagon tipped over <br/>";
		
			if ($_SESSION["oxen"] > 0){
				$msg .= "You lost 1 oxen<br/>";			
				$_SESSION["oxen"] = $_SESSION["oxen"] -1;
			}
		
			$msg .= "You lost ".ceil($_SESSION['bait']/4). " bait<br/>";			
			$_SESSION["bait"] = floor( $_SESSION["bait"]*3/4);
			if (($chance < 10) && ($_SESSION["wheels"]> 0)){
				
				$msg .= "You lost 1 wheel<br/>";			
				$_SESSION["wheels"] = $_SESSION["wheels"] -1;
			}
			else if (($chance < 20)&& ($_SESSION["axles"] > 0)){
				
				$msg .= "You lost 1 axle<br/>";			
				$_SESSION["axles"] =$_SESSION["axles"]-1;
			}
			else if (($chance < 30) && ($_SESSION["tongues"] > 0)){
				
				$msg .= "You lost 1 tongues<br/>";			
				$_SESSION["tongues"] = $_SESSION["tongues"]-1;
			}
			
			$msg .= "You lost ".ceil($_SESSION['money']/4). "money<br/>";			
			$_SESSION["money"] =floor( $_SESSION["money"]*3/4);
		
			$msg .= "You lost ".ceil($_SESSION['food']/6). "food<br/>";			
			$_SESSION["food"] = floor( $_SESSION["food"]*5/6);
		
			$msg .= "You lost ".ceil($_SESSION['clothing']/4). " clothes<br/>";			
			$_SESSION["clothing"] = floor( $_SESSION["clothing"]*3/4);
		}
		else{
			$msg .= "You crossed fine<br/>";
		}
		
	}
	elseif (($chose == "caulk") && ($deep <= 6)){
	
		if ($chance < 25){
			$msg.= "Your wagon tipped over <br/>";
		
			if ($_SESSION["oxen"] > 0){
				$msg .= "You lost 1 oxen<br/>";			
				$_SESSION["oxen"] = $_SESSION["oxen"] -1;
			}
		
			$msg .= "You lost ".ceil($_SESSION['bait']/4). " bait<br/>";			
			$_SESSION["bait"] = floor( $_SESSION["bait"]*3/4);
			if (($chance < 10) && ($_SESSION["wheels"]> 0)){
				
				$msg .= "You lost 1 wheel<br/>";			
				$_SESSION["wheels"] = $_SESSION["wheels"] -1;
			}
			else if (($chance < 20)&& ($_SESSION["axles"] > 0)){
				
				$msg .= "You lost 1 axle<br/>";			
				$_SESSION["axles"] =$_SESSION["axles"]-1;
			}
			else if (($chance < 30) && ($_SESSION["tongues"] > 0)){
				
				$msg .= "You lost 1 tongues<br/>";			
				$_SESSION["tongues"] = $_SESSION["tongues"]-1;
			}
			
			$msg .= "You lost ".ceil($_SESSION['money']/4). "money<br/>";			
			$_SESSION["money"] =floor( $_SESSION["money"]*3/4);
		
			$msg .= "You lost ".ceil($_SESSION['food']/6). "food<br/>";			
			$_SESSION["food"] = floor( $_SESSION["food"]*5/6);
		
			$msg .= "You lost ".ceil($_SESSION['clothing']/4). " clothes<br/>";			
			$_SESSION["clothing"] = floor( $_SESSION["clothing"]*3/4);
		}
		else{
			$msg .= "You crossed fine<br/>";
		}
		
	
	}
	elseif (($chose == "caulk") && ($deep > 6)){
		
		if ($chance < 40){
			$msg.= "Your wagon tipped over <br/>";
		
			if ($_SESSION["oxen"] > 0){
				$msg .= "You lost 1 oxen<br/>";			
				$_SESSION["oxen"] = $_SESSION["oxen"] -1;
			}
			
			$msg .= "You lost ".ceil($_SESSION['bait']/4). " bait<br/>";			
			$_SESSION["bait"] = floor( $_SESSION["bait"]*3/4);
			
			if (($chance < 10) && ($_SESSION["wheels"]> 0)){
				
				$msg .= "You lost 1 wheel<br/>";			
				$_SESSION["wheels"] = $_SESSION["wheels"] -1;
			}
			else if (($chance < 20)&& ($_SESSION["axles"] > 0)){
				
				$msg .= "You lost 1 axle<br/>";			
				$_SESSION["axles"] =$_SESSION["axles"]-1;
			}
			else if (($chance < 30) && ($_SESSION["tongues"] > 0)){
				
				$msg .= "You lost 1 tongues<br/>";			
				$_SESSION["tongues"] = $_SESSION["tongues"]-1;
			}
			
			$msg .= "You lost ".ceil($_SESSION['money']/4). "money<br/>";			
			$_SESSION["money"] =floor( $_SESSION["money"]*3/4);
		
			$msg .= "You lost ".ceil($_SESSION['food']/6). "food<br/>";			
			$_SESSION["food"] = floor( $_SESSION["food"]*5/6);
		
			$msg .= "You lost ".ceil($_SESSION['clothing']/4). " clothes<br/>";			
			$_SESSION["clothing"] = floor( $_SESSION["clothing"]*3/4);
		}
		else{
			$msg .= "You crossed fine<br/>";
		}
		
		
	}
	
	elseif ($chose == "ferry"){
	// wait round(chance/10) days, with health updates
		$chance = rand(1,5);
		
		echo "<script language='javascript' type='text/javascript'>";
		echo "ferryDate($chance);";
		echo "</script>";
		
		$msg .= "You waited $chance days<br/>";
		if ($_SESSION["locale"] > 3){
			$msg .= "It costed you 3 clothes<br/>";
			$_SESSION["clothing"] =$_SESSION["clothing"]-3;
		}
		else{
			$msg .= "It costed you 5 dollars<br/>";
			$_SESSION["money"] =$_SESSION["money"]-5;
		}
		$msg .= "You crossed fine<br/>";
	}
	
	
	echo("$msg");
	
	?>
  <form name="info" action="game.php" method="post">
  	<button onclick="sendSession()" type="submit">Game </button>
  </form>
  </body>
</html>
