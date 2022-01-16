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
  <title>block</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="30">
</head>
<style>
  ::placeholder {
    color:white;
  }
  </style>
<body>
 <form action="block.php" method="get" class="h">
<div class="field">
<input type="text" placeholder="username" name="h"><button type="submit" name="search" class="loginbtn">Search</button></div>

</form>
<table>
  <tr class="tr">
      <th>USERNAME</th>
	  <th>PHONE NUMBER</th>
	  <th>HOUSE NAME</th>
	  <th>STATUS</th>
	  <th>ACTION</th>
  </tr>
<?php
if (isset($_GET['search'])){
$search= ($_GET['h']);

require 'config.php';
$query="SELECT * FROM landlord WHERE  username LIKE '%$search%' AND campus='$po'";
$results= $db->query($query) or die($db->error);
if($results->rowCount() > 0){
if($results= $db->query($query) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){


?>
  <tr class="trr">
  <td><?php echo $row->username;?></td>
  <td><?php echo $row->phone;?></td>
  <td><?php echo $row->house;?></td>
  <td><?php echo $row->status;?></td>
  <td><div class="nav-link"><a href=block2.php?id=<?php echo $row->id;?>>BLOCK/UNBLOCK</a></div>
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
  <td><?php echo $row->status;?></td>
  <td><div class="nav-link"><a href=block2.php?id=<?php echo $row->id;?>>BLOCK/UNBLOCK</a></div>
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
  
  
 