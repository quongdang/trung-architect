<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$headers = apache_request_headers();
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/aboutUs.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare aboutUs object
$aboutUs = new AboutUs($db);
 
// get id of aboutUs to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of aboutUs to be edited
$aboutUs->id = $data->id;
 
// set aboutUs property values
$aboutUs->title_vn = $data->title_vn;
$aboutUs->title_en = $data->title_en;
$aboutUs->content_vn = $data->content_vn;
$aboutUs->content_en = $data->content_en;
 
// update the aboutUs
if($aboutUs->update()){
    echo '{';
        echo '"message": "aboutUs was updated."';
    echo '}';
}
 
// if unable to update the aboutUs, tell the user
else{
    echo '{';
        echo '"message": "Unable to update aboutUs."';
    echo '}';
}
?>