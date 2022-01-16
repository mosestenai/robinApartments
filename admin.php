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
<html>
<head><title>
admin</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="60">
</head>
<body>
<br><br>
<header class="navheader">
<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<nav class="navburger">
   <br><br>
   <ul>
	 <li>
	    <a href="adminmessage.php"><h2>MESSAGES</h2></a>
		
	</li>
	 <li>

	    <a href="index.php"><h2>LOGOUT</h2></a>
		<br><br>
	</li>
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label>
<font color="white"></font><p class="head"><font color="white"><i>Robin </i></font>
<font color="yellow">Apartments</font></p>
</header><br><br><br><br><br><br><br>
<div class="fieldset-contact" align="middle">
<br><br><br>
<h1 align="middle">DASHBOARD</h1><br>

<a href="addadmin.php"><button class="btn">Add an Admin</button></a>
<br><br><br>
<a href="addlandlord.php"><button class="btn">Add apartment</button></a>
<br /><br><br>
<a href="deleteacc.php"><button class="btn">Delete Account</button></a>
<br><br><br>
<a href="users.php"><button class="btn">View users</button></a>
<br><br><br>
<a href="block.php"><button class="btn">Block a user</button></a>
<br><br><br>

</div>


</body>
</html>