<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/growWithUs.php';
 
// instantiate database and growWithUs object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$growWithUs = new GrowWithUs($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query growWithUs
$stmt = $growWithUs->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // growWithUs array
    $growWithUs_arr=array();
    $growWithUs_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $growWithUs_item=array(
            "id" => $id,
            "title_vn" => $title_vn,
			"title_en" => $title_en,
			"content_vn" => html_entity_decode($content_vn),
			"content_en" => html_entity_decode($content_en),
			"created" => $created
        );
 
        array_push($growWithUs_arr["records"], $growWithUs_item);
    }
 
    echo json_encode($growWithUs_arr);
}
 
else{
    echo json_encode(
        array("message" => "No growWithUs found.")
    );
}
?>