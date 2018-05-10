<?php
	session_start();

	if(!$_SESSION['email'])
	{

		header("Location: admin.php");//redirect to login page to secure the welcome page without login access.
	}
	
	include_once('curl_function.php');
?>

<div class="table-scrol">
	<h1 align="center">All the Projects</h1>
	<a href="admin.php?page=create_project"><button class="btn btn-danger">Create</button></a><br/>
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
					<th>Image</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php
		   
				$get_data = callAPI('GET', '/api/project/read.php', false);
				$response = json_decode($get_data, true);
				$data = $response['records'];
				$message = $response['message'];
				if($message == null) {
					foreach((array)$data as $item) { //foreach element in $arr
			?>

					<tr>
						<td><?php echo $item['id']  ?></td>
						<td><?php echo $item['title_vn']  ?></td>
						<td><?php echo $item['subtitle_vn']  ?></td>
						<td>
							<?php
								if ($item['image0']) {
							?>
									<img src="<?php echo $item['image0']  ?>" with=100px height=100px/>
							<?php
								}
							?>
						</td>
						<td>
							<a href="admin.php?page=create_project&id=<?php echo $item['id'] ?>"><button class="btn btn-danger">Edit</button></a>
							<a href="admin.php?page=projects&del=<?php echo $item['id'] ?>"><button class="btn btn-danger">Delete</button></a>
						</td>
					</tr>
				<?php }
				} 
				echo $data;?>

		</table>
	</div>
</div>
