<?php error_reporting (E_ALL ^ E_NOTICE) ;?>
<?php 
session_start();
$idf= ($_GET['id']);
$_SESSION['profile'] = $idf;
?>
<!DOCTYPE html>
<html>
<head><title>
change pics</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="60">
</head>
<body>
<header class="navheader">

<h1></h1>
<input type="checkbox" class="nav-toggle" id="nav-toggle">
<p><font color="white"> </font></p>
<nav class="navburger">
   <br>
   <ul>
	 <li>
	    <a href="index.php"><h2>home</h2></a>
		<br><br>
	</li>
	
</ul>
</nav>
<label for="nav-toggle" class="nav-toggle-label">
<span></span></label><font color="white"></font><p class="head"><font color="white"><i>Robin</i></font>
<font color="yellow">Apartments</font></p>
</header>
<br><br><br><br><br><br><br>
    <div class="image">
<form action="profileserver.php" method="post" enctype="multipart/form-data">


Select image to change your slot one pic;
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="hidden" name="type" value="slot1" >
<input type="submit" value="Upload Image" name="submit">
</form>
<form action="profileserver.php" method="post" enctype="multipart/form-data">
<br><br><br><br>

Select image to change your slot two pic;
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="hidden" name="type" value="slot2" >
<input type="submit" value="Upload Image" name="submit">
</form>
<form action="profileserver.php" method="post" enctype="multipart/form-data">

<br><br><br><br>
Select image to change your slot three pic;
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="hidden" name="type" value="slot3" >
<input type="submit" value="Upload Image" name="submit">
</form>
<form action="profileserver.php" method="post" enctype="multipart/form-data">
<br><br><br><br>

Select image to change your slot four pic;
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="hidden" name="type" value="slot4" >
<input type="submit" value="Upload Image" name="submit">
</form>
</div>
</body>
</html>
