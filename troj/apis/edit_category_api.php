<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_REQUEST['5$fgk'];
    $gt = $_REQUEST['id'];
    if (empty($token) or empty($gt)) {
        http_response_code($response_code = 403);
    } else {

        $sink = ($_REQUEST['sink']);
        $rooms = ($_REQUEST['rooms']);
        $price = ($_REQUEST['price']);
        $bathroom = ($_REQUEST['bathroom']);
        $toilet = ($_REQUEST['toilet']);
        $tiles = ($_REQUEST['tiles']);
        $ceiling = ($_REQUEST['ceiling']);
        $dustbin = ($_REQUEST['dustbin']);
        $bed = ($_REQUEST['bed']);
        $matress = ($_REQUEST['matress']);
        $rooter = ($_REQUEST['rooter']);
        $floor = $_REQUEST['floor'];
        $bed_size = $_REQUEST['bed_size'];
        $tables = ($_REQUEST['tables']);
        $facilities = $_REQUEST['facilities'];
        $chair = ($_REQUEST['chair']);
        $gate = ($_REQUEST['gate']);
        $room = ($_REQUEST['room']);
        $capacity = ($_REQUEST['capacity']);
        $profile_url = ($_REQUEST['profile_url']);
        $category = ($_REQUEST['category']);


        //if errors are none

        $sql = "UPDATE  landlord SET house='null' ,avalrooms='$rooms',floor='$floor',bed_size='$bed_size', price='$price' ,sink='$sink' ,bathroom='$bathroom',
  toilet='$toilet',ceiling='$ceiling',dustbin='$dustbin',bed='$bed',matress='$matress',rooter='$rooter',tables='$tables',chair='$chair',gate='$gate',
  room='$room',capacity='$capacity',tiles='$tiles',facilities='$facilities' WHERE id='$gt' ";
        $db->query($sql) or die($db->error);
        
        //success response code
        http_response_code($response_code= 200);
    }
} else {
    //error response code if a user used a GET instead of a POST
    http_response_code($response_code = 400);
}
