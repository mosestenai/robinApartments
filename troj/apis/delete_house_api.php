<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = $_REQUEST['id'];
    require 'config.php';
    if (!empty($id)) {
        $sql = "DELETE FROM landlord WHERE id='$id'";
        $db->query($sql);
        //success response code
        http_response_code($response_code=200);
    } else {
        //Forbidden
        http_response_code($response_code = 403);
    }
} else {
    //Bad request
    http_response_code($response_code = 400);
}
