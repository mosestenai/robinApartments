<?php error_reporting (E_ALL ^ E_NOTICE);?>
<?php
session_start();
// including database connection file
require 'config.php';
// REGISTER USER

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = ($_POST['username']);
  $email = ($_POST['email']);
  $location= $_POST['location'];
  $password_1 = ($_POST['password_1']);
  $password_2 =($_POST['password_2']);
   // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Passwords do not match");
  }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = $db->query($user_check_query);
  $user=$result->fetch(PDO::FETCH_OBJ);
  
 
  if ($user) { // if user exists
    if ($user->username == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user->email == $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
     $usertable = str_replace(' ','',$username);
  	$query = "INSERT INTO users (username, email, password,location) 
  			  VALUES('$username', '$email', '$password','$location')";
  	$db->query($query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: viewhouse.php');
  }
}


//login
if (isset($_POST['login_user'])) {
  $username = ($_POST['username']);
  $password = ($_POST['password']);
	//displaying an error message when a fied is empty
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
//checking in the database if the username and paaword exists
  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
	$query2 = "SELECT * FROM admin WHERE username='$username'";
  $query3 = "SELECT * FROM landlord WHERE username='$username'";
  $results = $db->query($query);
	$results2 = $db->query($query2);
  $results3 = $db->query($query3);
	//logging in the user if the credentials are found in the database
  	if ($results->rowCount() == 1) {
	$user=$results->fetch(PDO::FETCH_OBJ);
	if(password_verify($password,$user->password) == 1){
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: viewhouse.php');
	
	}
  	}
	if ($results2->rowCount() == 1) {
	$user=$results2->fetch(PDO::FETCH_OBJ);
	if(password_verify($password,$user->password) == 1){
		
	  $_SESSION['username']=$username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: admin.php');
  	
	}
	}
	if ($results3->rowCount() == 1) {
    $user=$results3->fetch(PDO::FETCH_OBJ);
    if(password_verify($password,$user->password) == 1){
      
      $_SESSION['username']=$username;
        $_SESSION['success'] = "You are now logged in";
        header('location: landlord.php');
      
    }
    }
  //displaying an error message if there password of username wrongly entered 
	else {
  		array_push($errors, "Wrong username/password");
  	}
  }
 }


 //add admin
if (isset($_POST['reg_admin'])) {
  // receive all input values from the form
  $username = ($_POST['username']);
  $email = ($_POST['email']);
  $password_1 = ($_POST['password_1']);
  $password_2 =($_POST['password_2']);
  
   // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' ";
  $result = $db->query($user_check_query);
  $user=$result->fetch(PDO::FETCH_OBJ);
  
  if ($user) { // if user exists
    if ($user->username == $username) {
      array_push($errors, "Username already exists");
    }

    if ($user->email == $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password_1,PASSWORD_DEFAULT,array('cost' => 9));//encrypt the password before saving in the database
     
  	$query = "INSERT INTO admin (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	$db->query($query);
  	array_push($errors, "Admin added succesfully");
  }
}

//comment
if (isset($_POST['sendd'])) {
	
  $ff = str_replace(' ','',$_SESSION['user']);
  $rr= $_SESSION['username'];
  if(empty($rr)){
    array_push($errors, "You must login in order to comment");
  }else{
  $comment= ($_POST['comment']);
  if (empty($comment)) {
   array_push($errors, "nothing to comment");
 }
 $query8 = "SELECT * FROM $ff WHERE sender='$rr'";
 $result = $db->query($query8);
 
 // if user exists

   if ($result->rowCount() > 0) {
     array_push($errors, "ERROR!!YOU CAN ONLY COMMENT ONCE");
 }
 
 if (count($errors) == 0) {
 $query = "INSERT INTO $ff (comment,sender) VALUES ('$comment','$rr')";
 $db->query($query) or die($db->error);
 array_push($errors, "commented");
 }
  }
}

?>