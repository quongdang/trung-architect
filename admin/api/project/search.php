<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/project.php';
 
// instantiate database and project object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$project = new Project($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query projects
$stmt = $project->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // projects array
    $projects_arr=array();
    $projects_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $project_item=array(
            "id" => $id,
			"image0" =>  $project->image0,
            "image1" =>  $project->image1,
            "image2" =>  $project->image2,
            "image3" =>  $project->image3,
            "title_vn" => $title_vn,
			"title_en" => $title_en,
			"subtitle_vn" => $subtitle_vn,
			"subtitle_en" => $subtitle_en,
			"content_vn" => html_entity_decode($content_vn),
			"content_en" => html_entity_decode($content_en),
            "price" => $price,
            "category_id" => $category_id,
			"created" => $created
        );
 
        array_push($projects_arr["records"], $project_item);
    }
 
    echo json_encode($projects_arr);
}
 
else{
    echo json_encode(
        array("message" => "No projects found.")
    );
}
?>