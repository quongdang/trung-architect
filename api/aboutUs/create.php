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
 
// instantiate aboutUs object
include_once '../objects/aboutUs.php';
 
$database = new Database();
$db = $database->getConnection();
 
$aboutUs = new AboutUs($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set aboutUs property values
$aboutUs->title_vn = $data->title_vn;
$aboutUs->title_en = $data->title_en;
$aboutUs->content_vn = $data->content_vn;
$aboutUs->content_en = $data->content_en;
$aboutUs->created = date('Y-m-d H:i:s');
 
// create the aboutUs
if($aboutUs->create()){
    echo '{';
        echo '"message": "aboutUs was created."';
    echo '}';
}
 
// if unable to create the aboutUs, tell the user
else{
    echo '{';
        echo '"message": "Unable to create aboutUs."';
    echo '}';
}
?>