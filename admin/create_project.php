<?php
	session_start();

	if(!$_SESSION['email'])
	{

		header("Location: index.php");//redirect to login page to secure the welcome page without login access.
	}
	
	include_once('curl_function.php');
?>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
		<title>View Project</title>
	</head>
	<style>
		.login-panel {
			margin-top: 150px;
		}
		.table {
			margin-top: 50px;

		}
	</style>

	<body>
		<div class="table-scrol">
			<h1 align="center">All the Projects</h1>
			<a href="create_project.php"><button class="btn btn-danger">Create</button></a>
			<?php
				if (isset($_GET['del']))
				{
					delete($_GET['del']);
				}

				function delete($res)
				{
					$data_array =  array(
					   "id" => (string)($res)
					);
					$get_data = callAPI('POST', '/api/project/delete.php', json_encode($data_array));
					$response = json_decode($get_data, true);
					$data = $response['message'];
					echo $data;
				}
			?>
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
					<thead>
						<tr>
							<th>Project Id</th>
							<th>Title</th>
							<th>Sub-Title</th>
							<th>Action</th>
						</tr>
					</thead>

					<?php
				   
						$get_data = callAPI('GET', '/api/project/read.php', false);
						$response = json_decode($get_data, true);
						$data = $response['records'];
						$message = $response['message'];
						console_log($message);
						if($message == null) {
							foreach($data as $item) { //foreach element in $arr
					?>

							<tr>
								<td><?php echo $item['id']  ?></td>
								<td><?php echo $item['title_vn']  ?></td>
								<td><?php echo $item['subtitle_vn']  ?></td>
								<td><a href="projects.php?del=<?php echo $item['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
							</tr>
						<?php }
						} ?>

				</table>
			</div>
		</div>
	</body>
</html>
