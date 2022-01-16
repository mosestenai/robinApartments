<html>
<head><title>
landlord</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="search">

<header class="navheader">

<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<p><font color="white"> </font></p>
<nav class="navburger">
   <br>
   <ul>
  <li>
	    <a href="editrules.php"><h2>Edit rules</h2></a>
      <br><br>
	</li>		
	 <li>
	    <a href="landlordaccount.php"><h2>Account</h2></a>
      <br><br>
	</li>
	 <li>
	    <a href="abouthostel.php"> <h2> edit About hostel</h2></a>
      <br><br>
	</li>
	 <li>
	    <a href="index.php"><h2>home</h2></a>
      <br><br>
	</li>
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label><font color="white"></font><p class="head"><font color="white"><i>Robin</i></font>
<font color="yellow">Apartments</font></p></header><br><br><br><br><br>
<?php

//database connection
require 'config.php';

$dd=$_SESSION['username'];
$query3 = "SELECT * FROM landlord WHERE username='$dd'";
$results=$db->query($query3) or die($db->error);
if($results->rowCount() > 0){
if($results=$db->query($query3) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){
 $_SESSION['user']= $row->username;
 $gg= $_SESSION['user'];

session_start();
$idf= $row->id;
$_SESSION['profile'] = $idf;


?>
  <div class="view">
  <h3 align="middle"><?php echo $row->house; ?></h3>
  </div>
  <div class="image">
  <img src="<?php echo $row->profile_url;?> " style="width:1000px; height:600px; border-radius:50%; border:1px solid teal;">

   <form action="profileserver.php" method="post" enctype="multipart/form-data">
<?php error_reporting (E_ALL ^ E_NOTICE) ;?>

<input type="file" name="fileToUpload" id="fileToUpload">
<input type="hidden" name="type" value="profile" >
<input type="submit" value="Upload Image" name="submit">
<br><br><br><br></form>
</div>
<div class="image">
<img src="<?php echo $row->slot1;?>">
<img src="<?php echo $row->slot2;?>">
<img src="<?php echo $row->slot3;?>">
<img src="<?php echo $row->slot4;?>">
<a href=editpics.php?id=<?php echo $row->id; ?>><button class="loginbtm">Change photos</button></a>
 <br><br>
  
</div>
  <div class="image">
 <font color="black">
 
 
  <h4><font color="navy"><b>LOCATION:</b></font><?php echo $row->location; ?></h4>
  
		<h4><font color="navy"><b>PRECISE LOCATION</b></font>
    <?php echo $row->plocation;?></h4>
  </font><font color="navy">
 <?php echo $row->rooms;?></font> rooms Available<br><font color="navy">
 <?php echo $row->pricemonth;?></font> ksh per month<br>
  <font color="navy">FACILITIES</font><BR>
  <?php echo $row->facilities;?>
  <br>
  <?php include('errors.php');?>
<form  method="post" action="server2.php"> 
  <div class="input-group">
<input type="number" name="rooms" placeholder="TYPE NUMBER OF ROOMS AVAILABLE"><button type="submit" name="room" class="loginbtn">UPDATE</button>
<br><br>
<input type="number" name="price" placeholder="CHANGE PRICE"><button type="submit" name="pricee" class="loginbtn">UPDATE</button>
  
</div>
 
   </form>
   </div>
   <p>COMMENTS:<font color="red"></font><button class="ll"><a href=comments.php?id=<?php echo $row->id;?>>View all</a></button><br><?php 
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

  <?php
  }
  }
  }
  ?>

</body>
</html>