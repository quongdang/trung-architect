<?php
http_response_code(401);
    
// tell the user access denied  & show error message
echo json_encode(array(
    "message" => "Access denied."
));
?>