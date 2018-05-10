<?php
session_start();//session starts here
?>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
		<link type="text/css" rel="stylesheet" href="css/index.css">
		<title>Administrator</title>
	</head>
	<body>
		<div class="adminBody">
			<?php
			include_once("admin/header.php");
			include_once("admin/sidebar.php");
			?>
			<div class="content">
				<?php
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
			</div>
			<div style="clear: both"></div>
			<?php
			include_once("admin/footer.php");
			?>
		</div>
	</body>
</html>