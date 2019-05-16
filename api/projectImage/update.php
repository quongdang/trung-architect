<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$headers = apache_request_headers();
 
// include database and object files
include_once '../../configDb/database.php';
include_once '../objects/projectImage.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare projectImage object
$projectImage = new ProjectImage($db);
 
// get id of projectImage to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of projectImage to be edited
$projectImage->id = $data->id;
if ($projectImage->readOne()) { 
    // set projectImage property values
    $projectImage->project_id = $data->project_id;
    if ($projectImage->image_link != $data->image_link) {
        if (!unlink("../".$projectImage->image_link)) {
            echo "Couldn't delete file [".$projectImage->image_link."]. ";
        } 
        $projectImage->image_link = $data->image_link;
    }
    $projectImage->description_vn = $data->description_vn;
    $projectImage->description_en = $data->description_en;
    $projectImage->display = $data->display;
    
    // update the projectImage
    if($projectImage->update()){
        echo '{';
            echo '"message": "projectImage was updated."';
        echo '}';
    }
    
    // if unable to update the projectImage, tell the user
    else{
        echo '{';
            echo '"message": "Unable to update projectImage."';
        echo '}';
    }
}else {    
    echo '{';
        echo '"message": "Not found projectImage ['.$data->id.']."';
    echo '}';
}
?>