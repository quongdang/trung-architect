<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
   
// authentication
include_once '../authenticate/authentication.php';

// get database connection
include_once '../../config/database.php';
 
// instantiate user object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new User($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set user property values
$user->id = $data->id;

// delete the user
if($user->delete()){
    echo '{';
        echo '"message": "user ['.$data->id.'] was deleted."';
    echo '}';
}
 
// if unable to delete the user
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
 
?>