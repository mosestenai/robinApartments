<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';
$token = $_REQUEST['5$fgk'];
if (empty($token)) {
  //returning a an error response code if a request is made without a validation token 
  http_response_code($response_code = 403);
} else {
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  $hostelname = $data->hostelname;
  $location = $data->location;
  $landmarks = $data->landmarks;
  $price_sem = $data->price_sem;
  $price_month = $data->price_month;
  $paybill = $data->paybill;
  $password = $data->password;
  $email = $data->email;
  $phone = $data->phone;
  $rooms = $data->rooms;
  $idnumber = $data->idnumber;
  $username = $data->username;
  $bed_size = $data->bed_size;
  $floor_size = $data->floor_size;
  $accountno = $data->accountno;

  $kitchensink = $data->kitchensink;
  $toilet = $data->toilet;
  $bed = $data->bed;
  $chair = $data->chair;
  $bathroomsink = $data->bathroomsink;
  $gate = $data->gate;
  $bathroom = $data->bathroom;
  $dustbin = $data->dustbin;
  $tables = $data->tables;
  $ceiling = $data->ceiling;
  $matress = $data->matress;
  $router = $data->router;
  $tiles = $data->tiles;
  $hotshower = $data->hotshower;
  $balcony = $data->balcony;
  $url = "https://robin.herokuapp.com/images/applogo.png";

  if (
    empty($username) or empty($password)  or empty($hostelname) or empty($location) or empty($landmarks) or empty($price_sem) or empty($price_month)
    or empty($paybill) or empty($email) or empty($phone) or empty($rooms) or empty($idnumber) or  empty($bed_size) or empty($floor_size)
  ) {
    //error response code if any field is empty
    echo json_encode(array(
      'error' => "FILL ALL FIELDS"
    ));
  } else {

    $sql = "INSERT INTO landllord (statuss,accountno,paybill,landmarks,avalrooms,slot1,slot2,slot3,slot4,pricemonth,
    idnumber,email,house,location,rooms, price,bathroom,toilet,ceilling,dustbin,bed,matress,
    rooter,tables,chair,gate,profile_url,phone,username,password,tiles,campus,
    bathroomsink,floor,bed_size,hotshower,balcony)
      VALUES('blocked','$accountno','$paybill','$landmarks','$rooms','$url','$url','$url','$url','$price_month',
      '$idnumber','$email','$hostelname','$location','$rooms', '$price_sem',
    '$bathroom','$toilet','$ceiling','$dustbin','$bed','$matress',
    '$router','$tables','$chair','$gate','$url','$phone','$username','$password',
    '$tiles','$campus','$bathroomsink','$floor_size','$bed_size','$hotshower','$balcony')";

    $db->query($sql);
    echo json_encode(array(
      'response' => "success"
    ));


  }
}
