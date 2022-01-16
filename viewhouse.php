<?php error_reporting (E_ALL ^ E_WARNING );?>
<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>house list</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
  ::placeholder {
    color:white;
  }
  </style>
<body class="search">

<header class="navheader">

<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<p><font color="white"> </font></p>
<nav class="navburger">
   <br>
   <ul>
   <li>
	    <a href="useraccount.php"><h1>Account</h1></a>
      <br><br>
	</li>
	 <li>
	    <a href="login.php"><h1>Login</h1></a>
      <br><br>
	</li>
  <li>
	    <a href="viewpost.php"><h1>Announcements</h1></a>
      <br><br>
	</li>	
	 <li>
	    <a href="sign up.php"><h1>Sign up</h1></a>
      <br><br>
	</li>
	 <li>
	    <a href="faqs.php"><h1>FAQ'S</h1></a>
      <br><br>
	</li>
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label>
<font color="white"></font><p class="head"><font color="white"><i>Robin </i></font>
<font color="yellow">Apartments</font></p>
</header><br><br><br><br>

<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
<form action="viewhouse.php" method="get" class="h">
<div class="field">
<font color="white">
<input type="text" placeholder="HOUSE NAME/PRICE" name="h"></font><button type="submit" name="search" class="loginbtn">Search</button></div>
<br><br><br><div class="select">
<select type="text" list="sort" name="sort" ><datalist id="sort">
<option>Location</option>
<option>Nakuru</option>
<option>Nairobi</option>
<option>Kisumu</option></datalist></select>
<button type="submit" name="search_hostel" class="loginbtn">SORT</button></div>
<br>
</form>
 <?php error_reporting (E_ALL ^ E_NOTICE  && E_WARNING);?>
<?php
session_start();
// including database connection file
require 'config.php';
// REGISTER USER
 if (isset($_GET['search_hostel'])) {
  // receive all input values from the form
  $sort= $_GET['sort'];
 
 $query= "SELECT * FROM landlord WHERE location='$sort' AND status != 'blocked'";
 $result= $db->query($query);
 if ($result->rowCount() > 0){
 if ($result= $db->query($query)) {

while($row = $result->fetch(PDO::FETCH_OBJ)){

 ?>
 
 <div class="hoji">
<img src="<?php echo $row->profile_url;?>" style="width:250px; height:150px; border-radius:50%; border:1px solid teal;">
<br>
<font color="black"><?php echo $row->house;?><br>
<?php echo $row->pricemonth;?><br>
<?php echo $row->room;?><br>
<?php echo $row->rooms;?> rooms available<br>
<?php echo $row->location;?><br><br>
</font>
<!--Rating:<font color="blue">&#9734;&#9734;&#9734;&#9734;</font>-->
<div class="nav-link">
<a href=view.php?id=<?php echo $row->id;?>>VIEW</a></div><br>
<br>
</div>
   
   <?php
   }
  }
  }
  else {
   echo '<h3 align="center"><font color="red">NO MATCHES FOUND</font></h3>';
  }
  
 }
  else if(isset($_GET['search'])){
	 
$fgt= ($_GET['h']);
$search= strtoupper($fgt);
 $query="SELECT * FROM landlord  WHERE house LIKE '%$search%' AND status!='blocked' ";
 $result= $db->query($query);
  if ($result->rowCount() > 0){
  if ($result= $db->query($query)) {

 while($row = $result->fetch(PDO::FETCH_OBJ)){
 
  ?>
  
  <div class="hoji">
 <img src="<?php echo $row->profile_url;?>" style="width:250px; height:150px; border-radius:50%; border:1px solid teal;">
 <br>
 <font color="black"><?php echo $row->house;?><br>
 <?php echo $row->pricemonth;?><br>
 <?php echo $row->room;?><br>
 <?php echo $row->rooms;?> rooms available<br>
 <?php echo $row->location;?><br><br>
 </font>
 <!--Rating:<font color="blue">&#9734;&#9734;&#9734;&#9734;</font>-->
 <div class="nav-link">
 <a href=view.php?id=<?php echo $row->id;?>>VIEW</a></div><br>
 <br>
 </div>
   <?php
   }
  }
  }
  else{
    echo '<h2 align="middle"><font color="red">No matches found </font></h1>';
  }
	 
 }else{
 
    $query = "SELECT * FROM landlord WHERE  status!='blocked' ORDER BY house ASC";
    $result = $db->query($query);
    if ($result->rowCount() > 0){
    if ($result= $db->query($query)) {
  
   // while ($row = $result->fetch_assoc()){
   while($row = $result->fetch(PDO::FETCH_OBJ)){
   
    ?>
    
    <div class="hoji">
   <img src="<?php echo $row->profile_url;?>" style="width:250px; height:150px; border-radius:50%; border:1px solid teal;">
   <br>
   <font color="black"><?php echo $row->house;?><br>
   <?php echo $row->pricemonth;?><br>
   <?php echo $row->room;?><br>
   <?php echo $row->rooms;?> rooms available<br>
   <?php echo $row->location;?><br><br>
   </font>
   <!--Rating:<font color="blue">&#9734;&#9734;&#9734;&#9734;</font>-->
   <div class="nav-link">
   <a href=view.php?id=<?php echo $row->id;?>>VIEW</a></div><br>
   <br>
   </div>
   <?php
   }
  }
  }
 }

 
?>

  </body>
  </html> 
  