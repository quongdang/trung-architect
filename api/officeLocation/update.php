<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$headers = apache_request_headers();
 
// authentication
include_once '../authenticate/authentication.php';

// include database and object files
include_once '../../config/database.php';
include_once '../objects/officeLocation.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare officeLocation object
$officeLocation = new OfficeLocation($db);
 
// get id of officeLocation to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of officeLocation to be edited
$officeLocation->id = $data->id;
 
// set officeLocation property values
$officeLocation->title_vn = $data->title_vn;
$officeLocation->title_en = $data->title_en;
$officeLocation->content_vn = $data->content_vn;
$officeLocation->content_en = $data->content_en;
 
// update the officeLocation
if($officeLocation->update()){
    echo '{';
        echo '"message": "officeLocation was updated."';
    echo '}';
}
 
// if unable to update the officeLocation, tell the user
else{
    echo '{';
        echo '"message": "Unable to update officeLocation."';
    echo '}';
}
?>