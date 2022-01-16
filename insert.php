<?php

require 'config.php';
$sql="CREATE TABLE landlord (id SERIAL,plocation VARCHAR(255) , status  VARCHAR(255) ,accountno  VARCHAR(255),paybill  VARCHAR(255),slot1  VARCHAR(255),slot2  VARCHAR(255),slot3  VARCHAR(255),slot4  VARCHAR(255),pricemonth  VARCHAR(255),idnumber  VARCHAR(255),email  VARCHAR(255),house  VARCHAR(255),location  VARCHAR(255),rooms  VARCHAR(255),room  VARCHAR(255),date  VARCHAR(255),profile_url  VARCHAR(255),phone  VARCHAR(255),username  VARCHAR(255),password  VARCHAR(255),facilities  VARCHAR(5000))";
$db->query($sql);
$sql2="CREATE TABLE admin (id SERIAL,username  VARCHAR(255),email  VARCHAR(255),password  VARCHAR(255))";
$db->query($sql2);
$sql3="CREATE TABLE users (id SERIAL,username  VARCHAR(255),email  VARCHAR(255),password  VARCHAR(255),location VARCHAR(255))";
$db->query($sql3);

?>