<?php
	if(!$_COOKIE['jwt'])
	{

		header("Location: index.php");//redirect to login page to secure the welcome page without login access.
	}

	switch($_GET['type']) {
		case 'create':
			include_once("aboutUs_create.php");
			break;
		case 'edit':
			include_once("aboutUs_create.php");
			break;
        default:
			include_once("aboutUs_view.php");
	}

?>							
