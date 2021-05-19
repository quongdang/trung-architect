<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../objects/project.php';
include_once '../objects/projectImage.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare project object
$project = new Project($db);
 
// set ID property of project to be edited
$project->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of project to be edited
$project->readOne();
$projectImage = new ProjectImage($db);
$projectImage->project_id = $project->id;
 
// create array
$project_arr = array(
    "id" =>  $project->id,
    "title_vn" => $project->title_vn,
    "title_en" => $project->title_en,
    "subtitle_vn" => $project->subtitle_vn,
    "subtitle_en" => $project->subtitle_en,
    "content_vn" => html_entity_decode(htmlspecialchars_decode($project->content_vn)),
    "content_en" => html_entity_decode(htmlspecialchars_decode($project->content_en)),
    "metadata_vn" => json_decode(htmlspecialchars_decode($project->metadata_vn)),
    "metadata_en" => json_decode(htmlspecialchars_decode($project->metadata_en)),
    "metadata" => json_decode(htmlspecialchars_decode($project->metadata)),
    "category_id" => $project->category_id,
    "project_images"=> $projectImage->readByProjectIdToArray(),
    "created" => $project->created 
);
// print_r(htmlspecialchars_decode($project->metadata_en));
// make it json format
print_r(json_encode($project_arr));
?>