<?php
$id= $_GET['id'];
require 'config.php';
$sql= "SELECT * FROM landlord WHERE id='$id'";
$results = $db->query($sql) or die($db->error);
if($results= $db->query($sql) or die($db->error)){
while($row=$results->fetch(PDO::FETCH_OBJ)){

if ($row->status == 'blocked'){
$query="UPDATE landlord SET status='OPEN' WHERE id='$id' ";
$db->query($query);
header('location: block.php');
}
else if($row->status == 'OPEN'){
$query="UPDATE landlord SET status='blocked' WHERE id='$id' ";
$db->query($query);
header('location: block.php');
}
else{
$fg = 	"UPDATE landlord SET status='blocked' WHERE id='$id' ";
$db->query($fg);
header('location: block.php');
} 
}}
?>