<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
session_start();
if (isset($_POST["submit"])) {
   $type = $_POST['type'];
   $vv = $_SESSION['profile'];
   require 'config.php';
   $target_dir = "images/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
   //check if image is actual image or fake image 

   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   if ($check !== false) {
   } else {
      echo "File is not an image.";
      $uploadOk = 0;
   }


   //check file size
   if ($_FILES["fileToUpload"]["size"] > 700000) {
      echo "Sorry ,your file is too large.";
      $uploadOk = 0;
   }

   //ALLOW CERTAIN FILE FORMATS
   if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      echo "Only JPG,JPEG,PNG & GIF files are allowed.";
      $uploadOk = 0;
   }

   //check if $upload ok is set to 0 by an error
   if ($uploadOk == 0) {
      echo "Sorry your file was not uploaded.";
      //if everything is ok
   } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         
         if ($type == 'profile') {
            $query = "UPDATE landlord SET profile_url = '$target_file' WHERE id= '$vv'";
            $db->query($query);
            header('location: landlord.php');
         } elseif ($type == 'slot1') {
            $query = "UPDATE landlord SET slot1 = '$target_file' WHERE id= '$vv'";
            $db->query($query);
            header('location: landlord.php');
         } elseif ($type == 'slot2') {
            $query = "UPDATE landlord SET slot2 = '$target_file' WHERE id= '$vv'";
            $db->query($query);
            header('location: landlord.php');
         } elseif ($type == 'slot3') {
            $query = "UPDATE landlord SET slot3 = '$target_file' WHERE id= '$vv'";
            $db->query($query);
            header('location: landlord.php');
         } elseif ($type == 'slot4') {
            $query = "UPDATE landlord SET slot4 = '$target_file' WHERE id= '$vv'";
            $db->query($query);
            header('location: landlord.php');
         }
      } else {
         echo "Sorry there was an error uploading your file.";
      }
   }
}


?>
