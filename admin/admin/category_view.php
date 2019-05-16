<?php
	session_start();

	if(!$_SESSION['email'])
	{
		header("Location: index.php");//redirect to login page to secure the welcome page without login access.
	}
	
	include_once('curl_function.php');
?>

<div class="table-scrol">
	<h1 align="center">All the Categories</h1>
	<a href="index.php?page=categories&type=create"><button class="btn btn-danger">Create</button></a><br/>
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
			$get_data = callAPI('POST', '/api/category/delete.php', json_encode($data_array));
			$response = json_decode($get_data, true);
            $data = $response['message'];
            
			echo "<script>window.open('index.php?page=categories','_self')</script>";
		}
	?>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name VN</th>
					<th>Name EN</th>
					<th>Action</th>
				</tr>
			</thead>

			<?php		   
				$get_data = callAPI('GET', '/api/category/read.php', false);
				$response = json_decode($get_data, true);
                $data = $response['records'];
				$message = $response['message'];
				if($message == null) {
					foreach((array)$data as $item) {
			?>
					<tr>
						<td><?php echo $item['id']  ?></td>
						<td><?php echo $item['category_vn']  ?></td>
						<td><?php echo $item['category_en']  ?></td>
						<td>
							<a href="index.php?page=categories&type=edit&id=<?php echo $item['id'] ?>"><button class="btn btn-danger">Edit</button></a>
							<a href="index.php?page=categories&del=<?php echo $item['id'] ?>"><button class="btn btn-danger">Delete</button></a>
						</td>
					</tr>
				<?php }
				}
				?>
		</table>
	</div>
</div>
