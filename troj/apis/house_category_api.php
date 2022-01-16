<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_REQUEST['5$fgk'];
    $username = $_REQUEST['username'];
    if (empty($token) or empty($sername)) {
        //returning a an error response code if a request is made without a validation token or empty username
        http_response_code($response_code = 403);
    } else {
        $sink = ($_POST['sink']);
        $rooms = ($_POST['rooms']);
        $price = ($_POST['price']);
        $bathroom = ($_POST['bathroom']);
        $toilet = ($_POST['toilet']);
        $tiles = ($_POST['tiles']);
        $ceiling = ($_POST['ceiling']);
        $dustbin = ($_POST['dustbin']);
        $bed = ($_POST['bed']);
        $matress = ($_POST['matress']);
        $rooter = ($_POST['rooter']);
        $tables = ($_POST['tables']);
        $chair = ($_POST['chair']);
        $gate = ($_POST['gate']);
        $room = ($_POST['room']);
        $date = ($_POST['date']);
        $facilities = $_POST['facilities'];
        $capacity = ($_POST['capacity']);
        $profile_url = ($_POST['profile_url']);
        $category = ($_POST['category']);

        $drink = str_replace(',', '<br>', $drinks);
        $food = str_replace(',', '<br>', $foods);
        $snack = str_replace(',', '<br>', $snacks);
        $sql = "INSERT INTO landlord (house,rooms, price ,sink,bathroom,toilet,ceilling,dustbin,bed,matress,
        rooter,tables,chair,gate,room,date,capacity,profile_url,username,tiles,category,facilities)  VALUES('null','$rooms', '$price',
        '$sink','$bathroom','$toilet','$ceiling','$dustbin','$bed','$matress',
        '$rooter','$tables','$chair','$gate','$room','$date','$capacity','$profile_url','$username','$tiles','$category','$facilities')";
        $db->query($sql) or die($db->error);

        //success response code when hostel category is added 
        http_response_code($response_code = 200);
    }
} else {
    //Bad request
    http_response_code($response_code = 400);
}
