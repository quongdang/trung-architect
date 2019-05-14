<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../../configDb/database.php';
 
// instantiate aboutUs object
include_once '../objects/aboutUs.php';
 
$database = new Database();
$db = $database->getConnection();
 
$aboutUs = new AboutUs($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set aboutUs property values
$aboutUs->id = $data->id;

// delete the aboutUs
if($aboutUs->delete()){
    echo '{';
        echo '"message": "aboutUs ['.$data->id.'] was deleted."';
    echo '}';
}
 
// if unable to delete the aboutUs
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
 
?>