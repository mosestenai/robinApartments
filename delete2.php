<?php
$id= $_GET['id'];
require 'config.php';
$sql= "DELETE FROM landlord WHERE id='$id'";
$db->query($sql) or die($db->error);

header('location: deleteacc.php');

?>