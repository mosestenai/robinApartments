<?php
header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Origin: https://eazistey.co.ke');
header('Content-Type: application/json');
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $token = $_REQUEST['5$fgk'];
    if (empty($token)) {
        //access forbidden
        http_response_code($response_code = 403);
    } else {
        $query = "SELECT * FROM students";
        $result = $db->query($query);
        if ($result->rowCount() > 0) {
            if ($result = $db->query($query)) {
                while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                    $post_item = array(
                        'id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'campus' => $user->campus,
                    );

                    echo json_encode($post_item);
                }
            }
        } else {
            //resource not found
            http_response_code($response_code = 404);
        }
    }
} else {
    http_response_code($response_code = 400);
}

?>
