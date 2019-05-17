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
 
// instantiate growWithUs object
include_once '../objects/growWithUs.php';
 
$database = new Database();
$db = $database->getConnection();
 
$growWithUs = new GrowWithUs($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set growWithUs property values
$growWithUs->title_vn = $data->title_vn;
$growWithUs->title_en = $data->title_en;
$growWithUs->content_vn = $data->content_vn;
$growWithUs->content_en = $data->content_en;
$growWithUs->created = date('Y-m-d H:i:s');
 
// create the growWithUs
if($growWithUs->create()){
    echo '{';
        echo '"message": "growWithUs was created."';
    echo '}';
}
 
// if unable to create the growWithUs, tell the user
else{
    echo '{';
        echo '"message": "Unable to create growWithUs."';
    echo '}';
}
?>