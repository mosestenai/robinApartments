
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  if($_SESSION['username'] != 'main admin'){
    echo 'Restricted access';
  }else{
  ?>

  <?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>addadmin</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="newbody">
<form method="post" class="newform">
<?php include('errors.php'); ?>
<br>
<div class="input-group">
<input type="text" name="username" value="<?php echo $username;?>" placeholder="username"><br><br>
</div>
<div class="input-group">
<input type="email" name="email" placeholder="Email" value="<?php echo $email;?>">
</div><br><br>
<div class="input-group">
<input type="password" name="password_1" placeholder="Password">
</div><br><br>
<div class="input-group">
<input type="password" name="password_2" placeholder="Confirm password">
</div>
<div class="input-group">
  <p align="middle">
<button type="submit" class="loginbtm" name="reg_admin">Register</button></p>
</div>

&copy 2021 <font color="teal"><u>ROBIN.COM</u></font>. Designed by <font color="teal"><u>TENAI TECH</u></font><br>
 <br>

</form>

</body>
</html>
<?php
  }
?>