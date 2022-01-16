<?php
session_start(); 
if (!isset($_SESSION['username'])) {
  	header('location: login.php?message=login first in order to book a room.');
  }else{
	require 'config.php';
	  $id= $_GET['id'];
	  $price = $_GET['pricemonth'];
	  $paybill = $_GET['paybill'];
	 
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>pay</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="30">
</head>

<body>
<h1 align="middle"><font color="green">Robin mpesa checkout</font></h1>
<img src="images/mpesa.png" width="90%" height="250">
<form method="post" action="troj/register.php">
<br><br>
<?php include('errors.php'); ?><br><br>
<div class="input-group">
  		<label>YOUR PHONE NUMBER</label>
  		<input type="number" name="phone" value= "2547">
  	</div>
  	You are paying  <?php echo $price;?> kenyan shillings.
  		<input type="hidden" value="1" name='amount' >
  	<div class="input-group">
  		<button type="submit" class="loginbtn" name="pay">PAY</button>
  	</div><br>
	 
	</form>
	
	</body>

	</html>
	<?php
	}?>