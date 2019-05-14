<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../../configDb/database.php';
 
// instantiate growWithUs object
include_once '../objects/growWithUs.php';
 
$database = new Database();
$db = $database->getConnection();
 
$growWithUs = new GrowWithUs($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set growWithUs property values
$growWithUs->id = $data->id;

// delete the growWithUs
if($growWithUs->delete()){
    echo '{';
        echo '"message": "growWithUs ['.$data->id.'] was deleted."';
    echo '}';
}
 
// if unable to delete the growWithUs
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
 
?>