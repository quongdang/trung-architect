<?php
    // show error reporting
    error_reporting(E_ALL);
    
    // set your default time-zone
    date_default_timezone_set('Asia/Bangkok');
    
    // variables used for jwt
    $key = "TrungArchitectKey";
    $iss = "http://dongleweb.net";
    $aud = "http://www.dongleweb.com";
    $iat = 1356999524;
    $nbf = 1357000000;
?>