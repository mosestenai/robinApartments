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
  ?>
  <?php include('server2.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>admin add houses</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="search">
<form method="post"  class="form2" autocomplete="off">
<?php //include('errors.php'); ?>

<h2 align ="middle"><font color="navy">Add a House</font></h2>

<div class="input-group2">
<label>House name</label>
<input type="text" name="house" placeholder="house name"  value="<?php echo $_SESSION['house']; ?>"> <br><br>
<div class="input-group2">
<label>Username</label>
<input type="text" name="username" placeholder="username" autocomplete="off"   value="<?php echo $_SESSION['name'];?>"><br><br>
<label>Password</label>
<input type="password" name="password_1" placeholder="Password" autocomplete="off"   value="<?php echo $_SESSION['password_1']; ?>"><br><br>
<label>Confirm password</label>
<input type="password" name="password_2" placeholder="Confirm password"   value="<?php echo $_SESSION['password_2']; ?>">
</div><br><br>
</div>
<div class="select">
<select type="text" list="sort" name="location" ><datalist id="location">
<option>Location</option>
<option>kisumu</option>
<option>Nakuru</option>
<option>Nairobi</option></datalist></select>
</div>
<div class="input-group2">
<label>Location</label>
<input type="text" name="plocation" placeholder="precise Location"   value="<?php echo $_SESSION['location']; ?>"><br><br>
<label>Price per month</label>
<input type="number" name="pricemonth"  placeholder="price per month"   value="<?php echo $_SESSION['pricemonth']; ?>"><br><br>
</div>
<div class="input-group2">
<label>Number of houses</label>
<input type="number" name="rooms" placeholder="Number of rooms"   value="<?php echo $_SESSION['rooms']; ?>"><br><br>
<div class="input-group2">
<label>Date</label>
<input type="date" name="date" placeholder="DATE"  value="<?php echo $_SESSION['date']; ?>">

</div>
<br><div class="goh">
<label>Single room:</label><input type="radio" name="room" style="width:30px; height:30px;" value="single_room" ><br>
<label>Bedsitter:</label><font color="white">hjh</font><input type="radio" name="room" style="width:30px; height:30px;" value="bedsitter" ><br>
<label>Apartments:</label><input type="radio" name="room" style="width:30px; height:30px;" value="Apartments" ><br>
</div>
<br><br><br><br><br><br><br>
<h2><b>Facilities</b></h2>
<textarea rows="10" cols="90" name="facilities"  value=" <?php echo $_SESSION['facilities']; ?>"></textarea>
<div class="input-group2">
<label>Phone number</label>
<input type="text" name="phone" placeholder="Phone number"  value=" <?php echo $_SESSION['phone']; ?>"><br><br>
<label>Account number</label>
<input type="text" name="accountno" placeholder="Account number"   value="<?php echo $_SESSION['accountno']; ?>"><br><br>
<label>Paybill/till number</label>
<input type="text" name="paybill" placeholder="Paybill/till number"   value="<?php echo $_SESSION['paybill']; ?>"><br><br>
<label>Id number</label>
<input type="text" name="idnumber" placeholder="Id number"   value="<?php echo $_SESSION['idnumber']; ?>"><br><br>
<label>Email</label>
<input type="email" name="email" placeholder="Email"   value="<?php echo $_SESSION['email']; ?>"><br><br>
</div>
<p align="middle"><button type="submit" class="loginbtm" name="reghouse">ADD HOUSE</button></p><br>
&copy 2021 <font color="teal"><u>ROBIN.COM</u></font>. Designed by <font color="teal"><u>TENAI TECH</u></font><br>
 <br>

</form>

</body>
</html>