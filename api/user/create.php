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
$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$user->password = $data->password;
 
// create the user
if($user->create()){
    echo '{';
        echo '"message": "user was created."';
    echo '}';
} 
// if unable to create the user, tell the user
else{
    echo '{';
        echo '"message": "Unable to create user."';
    echo '}';
}
?>