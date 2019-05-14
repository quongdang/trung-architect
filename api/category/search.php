<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../configDb/database.php';
include_once '../objects/category.php';
 
// instantiate database and categories object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$categories = new Category($db);
 
// get keywords
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// query categories
$stmt = $categories->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // categories array
    $categories_arr=array();
    $categories_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $category_item=array(
            "id" => $id,
			"category_vn" =>  $project->category_vn,
            "category_en" =>  $project->category_en
        );
 
        array_push($categories_arr["records"], $category_item);
    }
 
    echo json_encode($categories_arr);
}
 
else{
    echo json_encode(
        array("message" => "No categories found.")
    );
}
?>