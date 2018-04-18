<?php
session_start();//session starts here

if(!$_SESSION['email'])
{    include_once("admin/login.php");
}else if ($_GET['page']) {
    switch ($_GET['page']){
        case 'create_project':
            include_once("admin/create_project.php");
            break;
        case 'projects':
            include_once("admin/projects.php");
            break;
    }
} else {
    include_once("admin/projects.php");
}

?>