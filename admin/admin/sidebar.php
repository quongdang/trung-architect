<?php
	session_start();

	if(!$_SESSION['email'])
	{

		header("Location: admin.php");//redirect to login page to secure the welcome page without login access.
	}
?>
<link type="text/css" rel="stylesheet" href="css/sidebar.css">
<div class="sidebar">
	<ul>
		<li><a href="#">Projects</a></li>
		<li><a href="#">Categories</a></li>
		<li><a href="#">User Management</a></li>
	</ul>
</div>