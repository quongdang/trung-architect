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
 
// instantiate officeLocation object
include_once '../objects/officeLocation.php';
 
$database = new Database();
$db = $database->getConnection();
 
$officeLocation = new OfficeLocation($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set officeLocation property values
$officeLocation->id = $data->id;

// delete the officeLocation
if($officeLocation->delete()){
    echo '{';
        echo '"message": "officeLocation ['.$data->id.'] was deleted."';
    echo '}';
}
 
// if unable to delete the officeLocation
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
 
?>