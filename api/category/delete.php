<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../../configDb/database.php';
 
// instantiate category object
include_once '../objects/category.php';
 
$database = new Database();
$db = $database->getConnection();
 
$category = new Category($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set category property values
$category->id = $data->id;

// delete the category
if($category->delete()){
    echo '{';
        echo '"message": "category ['.$data->id.'] was deleted."';
    echo '}';
}
 
// if unable to delete the category
else{
    echo '{';
        echo '"message": "Unable to delete category."';
    echo '}';
}
 
?>