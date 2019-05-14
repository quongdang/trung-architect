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
 
// query growWithUss
$stmt = $growWithUs->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // growWithUss array
    $growWithUss_arr=array();
    $growWithUss_arr["records"]=array();
 
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
			"content_vn" => html_entity_decode(htmlspecialchars_decode($content_vn)),
			"content_en" => html_entity_decode(htmlspecialchars_decode($content_en)),
			"created" => $created
        );
 
        array_push($growWithUss_arr["records"], $growWithUs_item);
    }
 
    echo json_encode($growWithUss_arr);
}
 
else{
    echo json_encode(
        array("message" => "No growWithUss found.")
    );
}
?>