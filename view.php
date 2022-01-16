<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  ?>
  <?php include('server.php') ?>
<html>
<head><title>
view houses</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="60">
</head>
<body class="search"><br><br>

<?php include('errors.php'); ?>
 <?php error_reporting (E_ALL ^ E_NOTICE  && E_WARNING);?>
 <?php 
 session_start();
  require 'config.php';
  
  $id= $_GET['id'];
  $query= "SELECT * FROM landlord WHERE id = '$id'";
  $results= $db->query($query) or die($db->error);
  if ($results->rowCount() > 0){
  if ($results= $db->query($query)) {
  while ($row = $results->fetch(PDO::FETCH_OBJ)){
  $_SESSION['user'] = $row->username; 
  $gg=$_SESSION['user'] ;
  
  
  ?>
  <div class="view">
  <h3 align="middle"><?php echo $row->house; ?></h3>
  </div>
  <div class="image">
  <br>
  <img src="<?php echo $row->profile_url;?> " style="width:1000px; height:600px; border-radius:50%; border:1px solid teal;" >
<br>
  </div>
  <div class ="image">
<img src="<?php echo $row->slot1;?>">
<img src="<?php echo $row->slot2;?>">
<img src="<?php echo $row->slot3;?>">
<img src="<?php echo $row->slot4;?>">
 <br><br>
  </div>
  <div class="image">
 <font color="black">
 <!--<a href="pay.php">pay</a>-->
 
  <h4><font color="navy"><b>LOCATION:</b></font><?php echo $row->location; ?></h4>
  
		<h4><font color="navy"><b>PRECISE LOCATION</b></font>
    <?php echo $row->plocation;?></h4>
  </font>
  <font color="navy">FACILITIES</font><BR>
  <?php echo $row->facilities;?>
  <br>
  <a href=pay.php?id=<?php echo $row->id;?>&pricemonth=<?php echo $row->pricemonth;?>&paybill=<?php echo $row->paybill;?>><button class="loginbtm">BOOK HOUSE</button></a>
  </div>
  <form  class="cc" method="post" >
  <div class="input-group7">
  <label>Comment:</label>
<input type="text" name="comment" ><button type="submit" name="sendd" title="tap to send" class="loginbtnn">SEND</button>
<br></div><br>
<p>COMMENTS:<font color="red">*NOTE:you can only comment once</font><button class="ll"><a href=comments.php?id=<?php echo $row->id;?>>View all</a></button><br><?php 
  $gf = str_replace(' ','',$gg);
  $query2= "SELECT * FROM $gf LIMIT 3";
  $results2= $db->query($query2);
  if ($results2->rowCount() > 0){
  if ($results2= $db->query($query2)) {
  while ($roww = $results2->fetch(PDO::FETCH_OBJ)){
  ?>
  
  <font color="blue">
  <?php echo $roww->sender;?>:</font><br><?php echo $roww->comment;?><br><?php
  }}}
  ?>
  <br>
  
  </p>
  
  <?php
  }}}
 ?>
  </form>
  
  
  </body>
  </html>
 