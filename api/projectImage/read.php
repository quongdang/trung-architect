<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../configDb/database.php';
include_once '../objects/projectImage.php';
 
// instantiate database and project object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$projectImage = new ProjectImage($db);
 
// query projectImages
$stmt = $projectImage->read();
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
        array("message" => "No projectImages found.")
    );
}
?>