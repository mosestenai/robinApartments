<?php error_reporting (E_ALL ^ E_NOTICE);?><?php

session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$minpassword = 7;
$host="ec2-52-21-252-142.compute-1.amazonaws.com";
$user="rlvsvmlvvkcxjm";
$password="a238615c93fc0666ddb5b87a65fea4d005f607bc8a7de7159832fc4223b53d30";
$dbname="d308b6rbpvmkpu";
$port="5432";
 
try{
$db = new PDO("pgsql:host=$host;dbname=$dbname;port=$port",$user,$password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error)
{
$error->getMessage();
}

?>