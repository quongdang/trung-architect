<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$headers = apache_request_headers();
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/project.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare project object
$project = new Project($db);
 
// get id of project to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of project to be edited
$project->id = $data->id;
 
// set project property values
$project->image0 = $data->image0;
$project->image1 = $data->image1;
$project->image2 = $data->image2;
$project->image3 = $data->image3;
$project->title_vn = $data->title_vn;
$project->title_en = $data->title_en;
$project->subtitle_vn = $data->subtitle_vn;
$project->subtitle_en = $data->subtitle_en;
$project->content_vn = $data->content_vn;
$project->content_en = $data->content_en;
$project->category_id = $data->category_id;
 
// update the project
if($project->update()){
    echo '{';
        echo '"message": "Project was updated."';
    echo '}';
}
 
// if unable to update the project, tell the user
else{
    echo '{';
        echo '"message": "Unable to update project."';
    echo '}';
}
?>