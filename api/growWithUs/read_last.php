<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/growWithUs.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare growWithUs object
$growWithUs = new GrowWithUs($db);
 
// set ID property of growWithUs to be edited
$growWithUs->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of growWithUs to be edited
$growWithUs->readLast();
 
// create array
$growWithUs_arr = array(
    "id" =>  $growWithUs->id,
    "title_vn" => $growWithUs->title_vn,
    "title_en" => $growWithUs->title_en,
	"content_vn" => html_entity_decode(htmlspecialchars_decode($growWithUs->content_vn)),
	"content_en" => html_entity_decode(htmlspecialchars_decode($growWithUs->content_en)),
    "created" => $growWithUs->created 
);
 
// make it json format
print_r(json_encode($growWithUs_arr));
?>