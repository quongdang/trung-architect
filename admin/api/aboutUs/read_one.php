<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/aboutUs.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare aboutUs object
$aboutUs = new AboutUs($db);
 
// set ID property of aboutUs to be edited
$aboutUs->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of aboutUs to be edited
$aboutUs->readOne();
 
// create array
$aboutUs_arr = array(
    "id" =>  $aboutUs->id,
    "title_vn" => $aboutUs->title_vn,
    "title_en" => $aboutUs->title_en,
	"content_vn" => html_entity_decode($aboutUs->content_vn),
	"content_en" => html_entity_decode($aboutUs->content_en),
    "category_id" => $aboutUs->category_id,
    "created" => $aboutUs->created 
);
 
// make it json format
print_r(json_encode($aboutUs_arr));
?>