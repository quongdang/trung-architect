<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../objects/projectImage.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare projectImage object
$projectImage = new ProjectImage($db);
 
// set ID property of projectImage to be edited
$projectImage->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of projectImage to be edited
$projectImage->readOne();
 
// create array
$projectImage_arr = array(
    "id" =>  $projectImage->id,
	"project_id" =>  $projectImage->image0,
    "image_link" =>  $projectImage->image_link,
    "description_vn" =>  $projectImage->description_vn,
    "description_en" =>  $projectImage->description_en,
    "display" => $projectImage->display
);
 
// make it json format
print_r(json_encode($projectImage_arr));
?>