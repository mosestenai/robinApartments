<?php 
  session_start(); 

  if (isset($_SESSION['username']) != 'main admin') {
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
 ?>
  <?php error_reporting (E_ALL ^ E_NOTICE  && E_WARNING);?>

<!DOCTYPE html>
<html>
<head>
  <title>delete acc</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
  ::placeholder {
    color:white;
  }
  </style>
<body>
 <form action="deleteacc.php" method="get" class="h">
<div class="field">
<input type="text" placeholder="username" name="h"><button type="submit" name="search" class="loginbtn">Search</button></div>

</form>
<table>
  <tr class="tr">
      <th>USERNAME</th>
	  <th>PHONE NUMBER</th>
	  <th>HOUSE NAME</th>
    <th>ACTION</th>
  </tr>
<?php
if (isset($_GET['search'])){
$search= ($_GET['h']);

require 'config.php';
$query="SELECT * FROM landlord WHERE  username LIKE '%$search%'";
$results= $db->query($query) or die($db->error);
if($results->rowCount() > 0){
if($results= $db->query($query) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){


?>
  <tr class="trr">
  <td><?php echo $row->username;?></td>
  <td><?php echo $row->phone;?></td>
  <td><?php echo $row->house;?></td>
  <td><div class="nav-link"><a href=delete2.php?id=<?php echo $row->id;?>  onclick="return confirm('Are you sure you want to delete this account?')">DELETE</a></div>
  </td>
   </tr>
   <?php
   }
  }
  }
  else {
  echo '<h2 align="middle"><font color="red">NO MATCHES FOUND</font></h2>';
  }
}
else{
require 'config.php';
$po=$_SESSION['campus'];
$query="SELECT * FROM landlord";
$results= $db->query($query) or die($db->error);
if($results->rowCount() > 0){
if($results= $db->query($query) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){

?>
<tr class="trr">
  <td><?php echo $row->username;?></td>
  <td><?php echo $row->phone;?></td>
  <td><?php echo $row->house;?></td>
  <td><div class="nav-link"><a href=delete2.php?id=<?php echo $row->id;?>  onclick="return confirm('Are you sure you want to delete this account?')">DELETE</a></div>
  </td>
   </tr>
   
   <?php

}
}
}
}
?>
</table>
</body>
</html>
  
  
 