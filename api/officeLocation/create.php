<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
   
// authentication
// include_once '../authenticate/authentication.php';

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
$officeLocation->title_vn = $data->title_vn;
$officeLocation->title_en = $data->title_en;
$officeLocation->content_vn = $data->content_vn;
$officeLocation->content_en = $data->content_en;
$officeLocation->created = gmdate('Y-m-d H:i:s');
 
// create the officeLocation
if($officeLocation->create()){
    echo '{';
        echo '"message": "officeLocation was created."';
    echo '}';
}
 
// if unable to create the officeLocation, tell the user
else{
    echo '{';
        echo '"message": "Unable to create officeLocation."';
    echo '}';
}
?>