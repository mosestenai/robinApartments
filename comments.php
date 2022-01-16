 <html>
<head><title>
comments</title>
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="refresh" content="60">
</head>
<body class="searchh">
<br><br><br><br><br><br><h2 align="middle"><font color="navy"><i>Comments</i></font></h2><br><br>
 <?php error_reporting (E_ALL ^ E_NOTICE  && E_WARNING);?>
 <?php 
 session_start();
  require 'config.php';
  
  $id= $_GET['id'];
  $v=str_replace(' ','',$_SESSION['user']);
  $query= "SELECT * FROM $v ";
  $results= $db->query($query) or die($db->error);
  if ($results->rowCount() > 0){
  if ($results= $db->query($query)) {
  while ($row = $results->fetch(PDO::FETCH_OBJ)){
  ?>
  <div class="onee">
  <font color="black"><?php echo $row->sender;?>:</font><br>
  <BR><font color="white"><?php echo $row->comment;?></font></div><?php
  }}}
  else{
  echo '<h1 align="middle"><font color="red">no comments</font></h1>';
  }
  ?>
  </body>
  </html>