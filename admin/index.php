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
		<?php
		if(!$_SESSION['email'])
		{    include_once("admin/login.php");
		}else {		
			?>
			<div class="adminBody">
				<table>
					<td>
						<?php
							include_once("admin/header.php");
							include_once("admin/sidebar.php");
						?>
							<div class="content">
							<?php
							if ($_GET['page']) {
								switch ($_GET['page']){
									case 'projects':
										include_once("admin/projects.php");
										break;
									case 'categories':
										include_once("admin/categories.php");
										break;
									case 'aboutUs':
										include_once("admin/aboutUs.php");
										break;
									case 'growWithUs':
										include_once("admin/growWithUs.php");
										break;
									default:
										include_once("admin/projects.php");								}
							} else {
								include_once("admin/projects.php");
							}
							?>
							</div>
						<?php
							include_once("admin/footer.php");
						?>
					</td>
				</table>			
			</div>
			<?php
		}
		?>
	</body>
</html>