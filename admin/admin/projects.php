<?php
	session_start();

	if(!$_SESSION['email'])
	{

		header("Location: admin.php");//redirect to login page to secure the welcome page without login access.
	}

	switch($_GET['type']) {
		case 'create':
			include_once("project_create.php");
			break;
		case 'edit':
			include_once("project_create.php");
			break;
		default:
			include_once("project_view.php");
	}

?>							
