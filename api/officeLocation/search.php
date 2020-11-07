<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../objects/officeLocation.php';
 
// instantiate database and officeLocation object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$officeLocation = new OfficeLocation($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query officeLocation
$stmt = $officeLocation->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // officeLocation array
    $officeLocation_arr=array();
    $officeLocation_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $officeLocation_item=array(
            "id" => $id,
            "title_vn" => $title_vn,
			"title_en" => $title_en,
			"content_vn" => html_entity_decode(htmlspecialchars_decode($content_vn)),
			"content_en" => html_entity_decode(htmlspecialchars_decode($content_en)),
			"created" => $created
        );
 
        array_push($officeLocation_arr["records"], $officeLocation_item);
    }
 
    echo json_encode($officeLocation_arr);
}
 
else{
    echo json_encode(
        array("message" => "No officeLocation found.")
    );
}
?>