<?php
// required to decode jwt
include_once '../../config/core.php';
include_once '../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../libs/php-jwt-master/src/ExpiredException.php';
include_once '../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// get jwt
$jwt=isset($_SERVER['HTTP_TOKEN']) ? $_SERVER['HTTP_TOKEN'] : "";
 
// if jwt is not empty
if($jwt){
 
    // if decode succeed, show user details
    try {
        // decode jwt
        $decoded = JWT::decode($jwt, $key, array('HS256'));
    }
    // if decode fails, it means jwt is invalid
    catch (Exception $e){
        header("Location: ../authenticate/accessDenied.php");
    }
}
// show error message if jwt is empty
else{
    header("Location: ../authenticate/accessDenied.php");
}
?>