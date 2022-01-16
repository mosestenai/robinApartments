<?php
header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Origin: https://eazistey.co.ke');
header('Content-Type: application/json');
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    $token = $_REQUEST['5$fgk'];
    if (empty($token)) {
        http_response_code($response_code = 401);
    } else {
        $id = $_REQUEST['id'];
        if (empty($id)) {
            //accesss forbidden
            http_response_code($response_code=403);
        } else {

            $query = "SELECT * FROM landlord WHERE id='$id'";
            $result = $db->query($query);
            if ($result->rowCount() > 0) {
                if ($result = $db->query($query)) {
                    while ($user = $result->fetch(PDO::FETCH_OBJ)) {
                        $post_item = array(
                            'hostel name' => $user->house,
                            'price' => $user->pricemonth,
                            'rooms' => $user->rooms,
                            'avalrooms' => $user->rooms,
                            'location' => $user->location,
                            'profile_url' => $user->profile_url,
                            'landmarks' => $user->landmarks,
                            'slot1' => $user->slot1,
                            'bathroomsink' => $user->bathroomsink,
                            'kitchensink' => $user->kitchensink,
                            'bathroom' => $user->bathroom,
                            'balcony' => $user->balcony,
                            'toilet' => $user->toilet,
                            'bed' => $user->bed,
                            'matress' => $user->matress,
                            'hotshower' => $user->hotshower,
                            'rooter' => $user->rooter,
                            'dustbin' => $user->dustbin,
                            'gate' => $user->gate,
                            'chair' => $user->chair,
                            'tiles' => $user->tiles,
                            'ceiling' => $user->ceiling,
                            'id' => $user->id,
                        );

                        echo json_encode($post_item);


                        $gg = $user->username;
                        $query2 = "SELECT * FROM landlord WHERE username='$gg' AND house = 'null'";
                        $results2 = $db->query($query2) or die($db->error);
                        if ($results2->rowCount() == 1) {
                            if ($results2 = $db->query($query2)) {
                                while ($roww = $results2->fetch(PDO::FETCH_OBJ)) {
                                    $posts_arr = array();
                                    $posts_arr['category1'] = array();
                                    $get_item = array(
                                        'price' => $roww->pricemonth,
                                        'rooms' => $roww->rooms,
                                        'avalrooms' => $roww->rooms,
                                        'slot2' => $roww->slot2,
                                        'bathroomsink' => $roww->bathroomsink,
                                        'kitchensink' => $roww->kitchensink,
                                        'bathroom' => $roww->bathroom,
                                        'balcony' => $roww->balcony,
                                        'toilet' => $roww->toilet,
                                        'bed' => $roww->bed,
                                        'matress' => $roww->matress,
                                        'hotshower' => $roww->hotshower,
                                        'rooter' => $roww->rooter,
                                        'dustbin' => $roww->dustbin,
                                        'gate' => $roww->gate,
                                        'chair' => $roww->chair,
                                        'tiles' => $roww->tiles,
                                        'ceiling' => $roww->ceiling,
                                        'id' => $roww->id,
                                    );
                                    array_push($posts_arr['category1'], $get_item);
                                    echo json_encode($posts_arr);
                                }
                            }
                        }
                    }
                }
            }
            else{
                //resource not found
                http_response_code($response_code=404);
            }
        }
    }
} else {
    //Bad Request
    http_response_code($response_code = 400);
}
