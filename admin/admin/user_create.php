<?php
	if(!$_COOKIE['jwt'])
	{

		header("Location: index.php");//redirect to login page to secure the welcome page without login access.
	}
	
	include_once('curl_function.php');
?>

<link type="text/css" rel="stylesheet" href="css/create_project.css">
<div class="table-scrol">
	<h1 align="center">Create User</h1>
	<div class="table-responsive">
		<?php
		if (isset($_POST['email'])) {
			$data_array =  array(
				"id" => $_POST['id'],
				"firstname" => (string)($_POST['firstname']),
				"lastname" => (string)($_POST['lastname']),
				"email" => (string)($_POST['email'])
			);
			
			$url = '';
			if ($_POST['id']) {
				$url .= '/api/user/update.php';
			}else {
				$url .= '/api/user/create.php';
			}

			$get_data = callAPI('POST', $url, json_encode($data_array));
			$response = json_decode($get_data, true);
			$create = $response['message'];
			echo $create;
			echo "<script>window.open('index.php?page=users','_self')</script>";
		} else if (isset($_GET['id'])) {
			$get_data = callAPI('GET', '/api/user/read_one.php?id='.(string)($_GET['id']), null);
			$response = json_decode($get_data, true);
			$data = $response;
		}

		?>
		<form action="index.php?page=users&type=create" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo  $data['id'] ?>"/>
			<input type="hidden" name="password" value="<?php echo  $data['password'] ?>"/>
			<table style="border: 0px">
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="firstname" value="<?php echo $data['firstname'] ?>"/></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lastname" value="<?php echo $data['lastname'] ?>"/></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="Email" value="<?php echo $data['Email'] ?>"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Submit" style="float:right"/></td>
				</tr>
			</table>
		</form>
	</div>
</div>
