<html>
	<head lang="en">
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="css\bootstrap.css">
		<link type="text/css" rel="stylesheet" href="css\index.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<title>Administrator</title>
	</head>
	<body>
		<?php
		if(!$_COOKIE['jwt'])
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
									case 'officeLocation':
										include_once("admin/officeLocation.php");
										break;
									case 'growWithUs':
										include_once("admin/growWithUs.php");
										break;
									case 'users':
										include_once("admin/user.php");
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