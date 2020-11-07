<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../objects/officeLocation.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare officeLocation object
$officeLocation = new OfficeLocation($db);
 
// set ID property of officeLocation to be edited
$officeLocation->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of officeLocation to be edited
$officeLocation->readOne();
 
// create array
$officeLocation_arr = array(
    "id" =>  $officeLocation->id,
    "title_vn" => $officeLocation->title_vn,
    "title_en" => $officeLocation->title_en,
	"content_vn" => html_entity_decode(htmlspecialchars_decode($officeLocation->content_vn)),
	"content_en" => html_entity_decode(htmlspecialchars_decode($officeLocation->content_en)),
    "created" => $officeLocation->created 
);
 
// make it json format
print_r(json_encode($officeLocation_arr));
?>