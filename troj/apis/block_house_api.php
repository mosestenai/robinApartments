<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_REQUEST['5$fgk'];
    $id = $_REQUEST['id'];
    if (empty($token) or empty($id)) {
        //returning a an error response code if a request is made without a validation token 
        http_response_code($response_code = 403);
    } else {

        $sql = "SELECT * FROM laandlord WHERE id='$id'";
        $results = $db->query($sql) or die($db->error);
        if ($results = $db->query($sql) or die($db->error)) {
            while ($row = $results->fetch(PDO::FETCH_OBJ)) {

                if ($row->statuss == 'blocked') {
                    $query = "UPDATE landlord SET statuss='OPEN' WHERE id='$id' ";
                    $db->query($query);
                    //success response code
                    http_response_code($response_code = 200);
                } else if ($row->statuss == 'OPEN') {
                    $query = "UPDATE landlord SET statuss='blocked' WHERE id='$id' ";
                    $db->query($query);
                    //success response code
                    http_response_code($response_code = 200);
                } else {
                    $fg =     "UPDATE landlord SET statuss='blocked' WHERE id='$id' ";
                    $db->query($fg);
                    //success response code
                    http_response_code($response_code = 200);
                }
            }
        }
    }
} else {
    //Bad request
    http_response_code($response_code = 400);
}
