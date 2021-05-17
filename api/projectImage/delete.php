<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$headers = apache_request_headers();

// authentication
include_once '../authenticate/authentication.php';

// get database connection
include_once '../../config/database.php';
include_once '../objects/projectImage.php';
 
$database = new Database();
$db = $database->getConnection();
 
$projectImage = new ProjectImage($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set projectImage property values
$projectImage->id = $data->id;

if ($projectImage->readOne()) {
    if (strlen($projectImage->image_link) > 0) {
        if(!unlink("../".$projectImage->image_link)) {
            error_log("Couldn't delete file [".$projectImage->image_link."]. ");
        }
    } 

    // delete the projectImage
    if($projectImage->delete()){
        echo '{';
            echo '"message": "projectImage ['.$data->id.'] was deleted.",';
            echo '"result": "SUCCESS"';
        echo '}';
    }
    // if unable to delete the projectImage
    else{
        echo '{';
            echo '"message": "Unable to delete object.",';
            echo '"result": "FAILURE"';
        echo '}';
    }
} else {    
    echo '{';
        echo '"message": "Not found projectImage ['.$data->id.']."';
    echo '}';
}
?>