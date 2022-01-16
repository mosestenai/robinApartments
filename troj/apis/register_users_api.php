<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
  //Bad request error
  http_response_code($response_code=400);
}else{
$token = $_REQUEST['5$fgk'];
if (empty($token)) {
  http_response_code($response_code = 403);
} else {
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  
  $password =  $data->password; 
  $username =  $data->username;
  $email = $data->email;

  if (empty($username) or empty($password) or empty($email)) {
   http_response_code($response_code = 401);
  

  } else {

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = $db->query($user_check_query);
    if ($result->rowCount() > 0) {
      $user = $result->fetch(PDO::FETCH_OBJ);


      if ($user) { // if user exists
        if ($user->username == $username) {
          echo json_encode( array(
            'error' => "username already exits"
          ));
        
        }

        if ($user->email == $email) {
         echo json_encode( array(
           'error' => "email already exits"
         ));
        }
      }
    } else {
      $password = password_hash($password_1, PASSWORD_DEFAULT, array('cost' => 9)); //encrypt the password before saving in the database
      $query = "INSERT INTO  users (username,email,password) VALUES('$username','$email','$password')";
      $db->query($query);
      $query5 = "SELECT FROM users WHERE username='$username'";
      $result3 = $db->query($query5);
    if ($result3->rowCount() > 0) {
        if ($result3 = $db->query($query5)) {
            while ($userr = $result3->fetch(PDO::FETCH_OBJ)) {
               $expires = date("U") + 1800;
               echo json_encode( array(
                'token' => $expires,
                'username' => $username,
                'permission' => 'user',
                'id' => $userr->id,
      )
      );
    }
  }
}

    }
  }
}
}
?>
