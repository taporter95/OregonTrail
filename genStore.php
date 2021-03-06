<?php
/*
General Store File for the Oregon Trail Game
This file links to several other php pages when buttons are clicked
and those pages update the number of each item that the user is 
attempting to buy.

These values are sent back as a post and added to the bill.
This page will head to a new page where the values are updated
when the bill is less than the amount of money the user has and 
after it has been confirmed that the user has at least one oxen.
*/
session_start();
$_SESSION["bill"] = 0;
if (isset($_POST['month'])){
$_SESSION["month"] = $_POST["month"];
}

//update items attempting to buy from the other pages
if (isset($_POST['oxenNum'])){
$_SESSION["oxenBought"] = $_POST["oxenNum"];

}

if (isset($_POST['foodNum'])){
$_SESSION["foodBought"] = $_POST["foodNum"];

}

if (isset($_POST['clothingNum'])){
$_SESSION["clothingBought"] = $_POST["clothingNum"];

}

if (isset($_POST['baitNum'])){
$_SESSION["baitBought"] = $_POST["baitNum"];

}
if (isset($_POST['wheelsNum'])){
$_SESSION["wheelsBought"] = $_POST["wheelsNum"];
}

if (isset($_POST['axlesNum'])){
$_SESSION["axlesBought"] = $_POST["axlesNum"];
}

if (isset($_POST['tonguesNum'])){
$_SESSION["tonguesBought"] = $_POST["tonguesNum"];
}

//add up the bill
if (isset($_SESSION['oxenBought'])){
//made it per oxen instead of per yoke
$_SESSION["bill"] = $_SESSION["bill"] + $_SESSION["oxenBought"] * 20;
}

if (isset($_SESSION['foodBought'])){
$_SESSION["bill"] = $_SESSION["bill"] + $_SESSION["foodBought"] * .20;
}

if (isset($_SESSION['clothingBought'])){
$_SESSION["bill"] = $_SESSION["bill"] + $_SESSION["clothingBought"] * 10;
}

if (isset($_SESSION['baitBought'])){
$_SESSION["bill"] = $_SESSION["bill"] + $_SESSION["baitBought"] * .10;
}
if (isset($_SESSION['wheelsBought'])){
$_SESSION["bill"] = $_SESSION["bill"] + $_SESSION["wheelsBought"] * 10;
}

if (isset($_SESSION['axlesBought'])){
$_SESSION["bill"] = $_SESSION["bill"] + $_SESSION["axlesBought"] * 10;
}

if (isset($_SESSION['tonguesBought'])){
$_SESSION["bill"] = $_SESSION["bill"] + $_SESSION["tonguesBought"] * 10;
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript" src="sessions.js"></script>
<link href="style.css" rel="stylesheet">
<script>
//on enter press function
$(document).keypress(function(e) {
console.log("in function");
var code = e.keyCode || e.which;
 if(code == 13) { //Enter keycode
   //Do something
   console.log("in function if");
  
  //variables for the bill and number of oxen
   var bill = parseInt(document.getElementById("bill").innerHTML);
   var money = parseInt(document.getElementById("money").innerHTML);
   var oxen = parseInt(document.getElementById("ox1").innerHTML);
   var oxenBought = parseInt(document.getElementById("ox2").innerHTML);
   oxTot = oxen + oxenBought;
   console.log(bill);
   console.log(money);
   console.log(oxTot);
   //if trying to buy too much
   if(bill > money)
   {
	   console.log("bill too high change items");
	   alert("bill too high change items");
	   document.getElementById("enoughMoney").innerHTML = "you have insufficient funds";
   }
   //if the user doesn't have one oxen
   else if(oxTot <= 0)
   {
	   console.log("you need at least one yoke of oxen");
	   alert("you need at least one yoke of oxen");
	   document.getElementById("enoughMoney").innerHTML = "you need at least one yoke of oxen";
   }
   else
   {
	   console.log("sufficient funds");
	   window.location.href = 'beginning.php';
   }
 }
});
</script>
<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
  <head>
    <title>OT General Store</title>
  </head>
  <body>

  <h1> General Store </h1>
  <p>Click the items to change the amount you want, current spending per item is listed to the right
  <br>Hit enter to continue when you are finished shopping</p>
  <form name="oxen" action="oxen.php" method="post">
  <button type="submit" class="test">Oxen</button>
  <?php echo str_pad(money_format("$%i", $_SESSION["oxenBought"] * 20),10, ".", STR_PAD_LEFT);?>
  </form>
  
  <form name="food" action="food.php" method="post">
  <button type="submit">Food</button>
  <?php echo str_pad(money_format("$%i", $_SESSION["foodBought"] * .20),10,".", STR_PAD_LEFT);?>
  </form>
  
  <form name="clothing" action="clothing.php" method="post">
  <button type="submit">Clothing</button>
  <?php echo str_pad(money_format("$%i", $_SESSION["clothingBought"] * 10),10,".", STR_PAD_LEFT);?>
  </form>
  
  <form name="bait" action="bait.php" method="post">
  <button type="submit">Bait</button>
  <?php echo str_pad(money_format("$%i", $_SESSION["baitBought"] * .10),10,".", STR_PAD_LEFT);?>
  </form>
  
  <form name="wagonWheel" action="wagonWheel.php" method="post">
  <button type="submit">Wheels</button>
  <?php echo str_pad(money_format("$%i", $_SESSION["wheelsBought"] * 10),10,".",STR_PAD_LEFT);?>
  </form>
  
  <form name="wagonaxle" action="wagonAxle.php" method="post">
  <button type="submit">Axles</button>
  <?php echo str_pad(money_format("$%i", $_SESSION["axlesBought"] * 10),10,".", STR_PAD_LEFT);?>
  </form>
  
  <form name="wagonTongue" action="wagonTongue.php" method="post">
  <button type="submit">Tongues</button>
  <?php echo str_pad(money_format("$%i", $_SESSION["tonguesBought"] * 10),10,".", STR_PAD_LEFT);?>
  </form>
  
  
  <p>Current Bill: <?php echo money_format("$%i", $_SESSION["bill"]);?></p>
  <p>Current Funds: <?php echo money_format("$%i", $_SESSION["money"]);?></p>
  <p id="enoughMoney"></p>
  <p id="bill" hidden><?php echo $_SESSION["bill"];?></p>
  <p id="money" hidden><?php echo $_SESSION["money"];?></p>
  <p id="ox1" hidden><?php echo $_SESSION["oxen"];?></p>
  <p id="ox2" hidden><?php echo $_SESSION["oxenBought"];?></p>
  
  
  </body>
</html>
