<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// authentication
include_once '../authenticate/authentication.php';

// get database connection
include_once '../../config/database.php';
 
// instantiate project object
include_once '../objects/project.php';
include_once '../objects/projectImage.php';
 
$database = new Database();
$db = $database->getConnection();
 
$project = new Project($db);
$projectImage = new ProjectImage($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set project property values
$project->id = $data->id;

// Delete image file and project image data
$projectImage->project_id = $data->id;
$stmt = $projectImage->readByProjectId();
$num = $stmt->rowCount();
$deleteAllImages = true;
if($num>0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
        if (!unlink("../".$image_link)) {
            echo "Couldn't delete file [".$image_link."]. ";
        } 
    }
}

if (!$projectImage->deleteByProjectId()) {        
    echo '{';
        echo '"message": "Unable to delete Project Images."';
    echo '}';
    $deleteAllImages = false;
}

if($deleteAllImages) {
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
}
?>