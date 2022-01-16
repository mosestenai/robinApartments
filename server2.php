<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php
session_start();
// including database connection file
require 'config.php';
if (isset($_POST['reghouse'])) {
  // receive all input values from the form
 
  $_SESSION['house']=$fgt  = ($_POST['house']);
  $ftg= $_SESSION['house'];
  $house = strtoupper($ftg);
  
  $_SESSION['name']=$username= ($_POST['username']);
  $_SESSION['idnumber']=$idnumber= $_POST['idnumber'];
  $_SESSION['email']=$email = $_POST['email'];
  $_SESSION['plocation']=$plocation= $_POST['plocation'];
  $location= $_POST['location'];
  $_SESSION['rooms']=$rooms = ($_POST['rooms']);
  $_SESSION['pricemonth']=$pricemonth = ($_POST['pricemonth']);
  $room= ($_POST['room']);
  $_SESSION['date']=$date=($_POST['date']);
  $profile_url='images/logo1.png';
  $slot1 = 'images/logo2.png';
  $slot2 = 'images/logo2.png';
  $slot3 = 'images/logo2.png';
  $slot4 = 'images/logo2.png';
  $_SESSION['password_1']=$password_1=($_POST['password_1']);
  $_SESSION['password_2']=$password_2=($_POST['password_2']);
  $_SESSION['phone']=$phone=($_POST['phone']);
  $_SESSION['accountno']=$accountno=$_POST['accountno'];
  $_SESSION['paybill']=$paybill=$_POST['paybill'];
  $_SESSION['facilities']=$facilities = $_POST['facilities'];
  $tg= $_SESSION['username'];
 
  //checking if the mandatory text field is empty
  //if(strpos($email, $word) !== true){ array_push($errors, "Invalid email");}
  if($location == 'Location'){ array_push($errors, "Specify the location");}
  if (empty($fgt)) { array_push($errors, "House name is required"); }
  if(strlen($password_1) < 8){ array_push($errors, "Password must have 8 or more characters");}
  if (strlen($phone) < 10) { array_push($errors, "Invalid phone number");}
  if (empty($rooms)) { array_push($errors, "Number of rooms is required"); }
  if (empty($username)) { array_push($errors, "username is required"); }
  if (empty($plocation)) { array_push($errors, "Add precise location"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  
   $user_check = "SELECT * FROM landlord WHERE username='$username' ";
  $resultt = $db->query($user_check);
  $userr=$resultt->fetch(PDO::FETCH_OBJ);
  
 
  if ($userr) { // if user exists
    if ($userr->username == $username) {
      array_push($errors, "Username already exists");
    }
  }else{
  //if errors are none
  if (count($errors) == 0) {
$usertable= str_replace(' ','',$username);
$password = password_hash($password_1,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
$sqw = "INSERT INTO landlord (plocation,status,accountno,paybill,slot1,slot2,slot3,slot4,pricemonth,idnumber,email,house,location,rooms,room,date,profile_url,phone,username,password,facilities) 
VALUES('$plocation','open','$accountno','$paybill','$slot1','$slot2','$slot3','$slot4','$pricemonth','$idnumber','$email','$house','$location','$rooms','$room','$date','$profile_url','$phone','$username','$password','$facilities')";
  
  $queryh= "CREATE TABLE $usertable (id SERIAL,comment VARCHAR(255) ,
sender VARCHAR(255) ,date VARCHAR(255) ,time VARCHAR(255),rules varchar(5000) )";
  $db->query($sqw) or die($db->error);
   $db->query($queryh) or die($db->error);
   session_destroy();
   $_SESSION['username']=$tg;
   array_push($errors, "House added successfully");
  
  }
}
}
//landlord updates
if (isset($_POST['pricee'])) {//update price
  // receive all input values from the form
  $price=$_POST['price'];
  if(empty($price)){ echo '<h3 align="middle">Price field is empty</h3>';}
  else{
$gh= $_SESSION['user'];
    $sql= "UPDATE landlord SET price='$price' WHERE username='$gh'";
    $db->query($sql);
    header ('location: landlord.php');
  }
}
if (isset($_POST['room'])) {//update rooms
  $rooms=$_POST['rooms'];
  if(empty($rooms)){ echo '<h3 align="middle">rooms field is empty</h3>';}
  else{
    $gh= $_SESSION['user'];
    $sql= "UPDATE landlord SET rooms='$rooms' WHERE username='$gh'";
    $db->query($sql);
    header ('location: landlord.php');
  }
}
?>