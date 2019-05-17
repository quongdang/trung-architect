<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../objects/projectImage.php';
 
// instantiate database and project object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$projectImage = new ProjectImage($db);

// set ID property of projectImage to be edited
$projectImage->project_id = isset($_GET['id']) ? $_GET['id'] : die();
 
// query projectImages
$stmt = $projectImage->readByProjectId();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // projectImages array
    $projectImages_arr=array();
    $projectImages_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $projectImage_item=array(
            "id" => $id,
            "project_id" => $project_id,
            "image_link" => $image_link,
            "description_vn" => $description_vn,
            "description_en" => $description_en,
            "display" => $display
        );
 
        array_push($projectImages_arr["records"], $projectImage_item);
    }
 
    echo json_encode($projectImages_arr);
}
 
else{
    echo json_encode(
        array("records" => array())
    );
}
?>