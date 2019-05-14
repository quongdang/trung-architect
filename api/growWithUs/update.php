<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$headers = apache_request_headers();
 
// include database and object files
include_once '../../configDb/database.php';
include_once '../objects/growWithUs.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare growWithUs object
$growWithUs = new GrowWithUs($db);
 
// get id of growWithUs to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of growWithUs to be edited
$growWithUs->id = $data->id;
 
// set growWithUs property values
$growWithUs->title_vn = $data->title_vn;
$growWithUs->title_en = $data->title_en;
$growWithUs->content_vn = $data->content_vn;
$growWithUs->content_en = $data->content_en;
 
// update the growWithUs
if($growWithUs->update()){
    echo '{';
        echo '"message": "growWithUs was updated."';
    echo '}';
}
 
// if unable to update the growWithUs, tell the user
else{
    echo '{';
        echo '"message": "Unable to update growWithUs."';
    echo '}';
}
?>