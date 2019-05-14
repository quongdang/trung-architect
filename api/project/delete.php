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
include_once '../objects/project.php';
 
$database = new Database();
$db = $database->getConnection();
 
$project = new Project($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set project property values
$project->id = $data->id;

// delete the project
if($project->delete()){
    echo '{';
        echo '"message": "Project ['.$data->id.'] was deleted."';
    echo '}';
}
 
// if unable to delete the project
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
 
?>