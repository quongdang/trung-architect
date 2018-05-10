<?php
	session_start();

	if(!$_SESSION['email'])
	{

		header("Location: admin.php");//redirect to login page to secure the welcome page without login access.
	}
?>
<link type="text/css" rel="stylesheet" href="css/header.css">
<div class="header">
	<div class="logo gradient-text"> Website Administrator </div>
	<div class="userInfor">Welcome <?php echo $_SESSION['email']?>.</div>
</div>