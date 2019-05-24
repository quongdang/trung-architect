<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// get database connection
include_once '../../config/database.php';
 
// instantiate FirebaseToken object
include_once '../objects/firebaseToken.php';
 
$database = new Database();
$db = $database->getConnection();
 
$firebaseToken = new FirebaseToken($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set firebaseToken property values
$firebaseToken->fcmToken = $data->fcmToken;
 
// create the firebaseToken
if($firebaseToken->create()){
    echo '{';
        echo '"message": "firebaseToken was created."';
    echo '}';
}
 
// if unable to create the firebaseToken, tell the user
else{
    echo '{';
        echo '"message": "Unable to create firebaseToken."';
    echo '}';
}
?>