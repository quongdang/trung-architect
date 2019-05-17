<?php
/**
 * Created by PhpStorm.
 * User: Ehtesham Mehmood
 * Date: 11/21/2014
 * Time: 2:46 AM
 */

;//session is a way to store information (in variables) to be used across multiple pages.
session_destroy();
setcookie("jwt", $_COOKIE['jwt'], time() - 360,'/');
header("Location: index.php");//use for the redirection to some page
?>