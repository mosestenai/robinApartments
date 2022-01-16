<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $token = $_REQUEST['5$fgk'];
  if (empty($token)) {
    //returning a an error response code if a request is made without a validation token 
    http_response_code($response_code = 403);
  } else {
    //fetching data from a post request made to this API
    $fgt  = ($_REQUEST['hostel']);
    $hostel = strtoupper($fgt);
    $username = ($_REQUEST['username']);
    $idnumber = $_REQUEST['idnumber'];
    $email = $_REQUEST['email'];
    $sink = ($_REQUEST['sink']);
    $location = ($_REQUEST['location']);
    $rooms = ($_REQUEST['rooms']);
    $pricemonth = ($_REQUEST['pricemonth']);
    $bathroom = ($_REQUEST['bathroom']);
    $toilet = ($_REQUEST['toilet']);
    $floor = $_REQUEST['floor'];
    $bed_size = $_REQUEST['bed_size'];
    $tiles = ($_REQUEST['tiles']);
    $ceiling = ($_REQUEST['ceiling']);
    $dustbin = ($_REQUEST['dustbin']);
    $bed = ($_REQUEST['bed']);
    $matress = ($_REQUEST['matress']);
    $landmarks = $_REQUEST['landmarks'];
    $rooter = ($_REQUEST['rooter']);
    $tables = ($_REQUEST['tables']);
    $chair = ($_REQUEST['chair']);
    $gate = ($_REQUEST['gate']);
    $room = ($_REQUEST['room']);
    $date = ($_REQUEST['date']);
    $locationurl = $_REQUEST['locationurl'];
    $capacity = ($_REQUEST['capacity']);
    $profile_url = 'images/logo1.jpg';
    $slot1 = 'https://robin.herokuapp.com/images/logo2.jpg';
    $slot2 = 'https://robin.herokuapp.com/images/logo2.jpg';
    $slot3 ='https://robin.herokuapp.com/images/logo2.jpg';
    $slot4 = 'https://robin.herokuapp.com/images/logo2.jpg';
    $password_1 = ($_REQUEST['password']);
    $phone = ($_REQUEST['phone']);
    $category = ($_REQUEST['category']);
    $accountno = $_REQUEST['accountno'];
    $paybill = $_REQUEST['paybill'];
    $facilities = $_REQUEST['facilities'];
    $payment = $_REQUEST['payments'];
    $payments = str_replace(',', '<br>', $payment);
    $facility = str_replace(',', '<br>', $facilities);


    $user_check = "SELECT * FROM landlord WHERE username='$username' ";
    $resultt = $db->query($user_check);
    if ($resultt->rowCount() == 0) {
      //inserting data in the data base if  there are no conflicting errors
      $usertable = str_replace(' ', '', $username);
      $password = password_hash($password_1, PASSWORD_DEFAULT, array('cost' => 9)); //encrypt the password before saving in the database
      $sqw = "INSERT INTO landlord (statuss,accountno,paybill,landmarks,avalrooms,slot1,slot2,slot3,slot4,
      pricemonth,idnumber,email,payments,house,locationurl,location,rooms,sink,bathroom,toilet,
      ceilling,dustbin,bed,matress,
    rooter,tables,chair,gate,room,date,capacity,profile_url,phone,username,password,tiles,category,
    facilities,bathroomsink,floor,bed_size)  VALUES('blocked','$accountno','$paybill','$landmarks','$rooms',
    '$slo1','$slot2','$slot3','$slot4','$pricemonth','$idnumber','$email','$payments','$hostel','$locationurl',
     '$location','$rooms',
    '$sink','$bathroom','$toilet','$ceiling','$dustbin','$bed','$matress',
    '$rooter','$tables','$chair','$gate','$room','$date','$capacity','$profile_url','$phone','$username',
    '$password','$tiles','$category',
    '$facility','$bathroomsink','$floor','$bed_size')";

      $queryh = "CREATE TABLE $usertable (id SERIAL, message VARCHAR(100) ,client VARCHAR(50) ,comment 
      VARCHAR(255) ,
    sender VARCHAR(255) ,date VARCHAR(255) ,time VARCHAR(255),rules varchar(5000) )";
      $db->query($sqw) or die($db->error);
      $db->query($queryh) or die($db->error);

      //success response code after data is entered successfully
      http_response_code($response_code = 200);
    } else {
      //error response code if another user exists of the same username
      http_response_code($response_code = 406);
    }
  }
} else {
  //error response code if a user used a GET instead of a POST
  http_response_code($response_code = 400);
}
