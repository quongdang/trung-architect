<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../../configDb/database.php';
 
// instantiate project object
include_once '../objects/projectImage.php';
 
$database = new Database();
$db = $database->getConnection();
 
$projectImage = new ProjectImage($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set projectImage property values
$projectImage->project_id = $data->project_id;
$projectImage->image_link = $data->image_link;
$projectImage->description_vn = $data->description_vn;
$projectImage->description_en = $data->description_en;
$projectImage->display = $data->display;
 
// create the projectImage
if($projectImage->create()){
    echo '{';
        echo '"message": "ProjectImage was created."';
    echo '}';
}
 
// if unable to create the projectImage, tell the user
else{
    echo '{';
        echo '"message": "Unable to create projectImage."';
    echo '}';
}
?>