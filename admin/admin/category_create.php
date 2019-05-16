<?php
	session_start();

	if(!$_SESSION['email'])
	{

		header("Location: index.php");//redirect to login page to secure the welcome page without login access.
	}
	
	include_once('curl_function.php');
?>

<link type="text/css" rel="stylesheet" href="css/create_project.css">
<script>
	function toogleDisplayContent() {
		var en = document.getElementById("en");
		en.classList.toggle("appear");

		var vn = document.getElementById("vn");
		vn.classList.toggle("appear");
	}
</script>
<div class="table-scrol">
	<h1 align="center">Create Category</h1>
	<div class="table-responsive">
		<?php
		if (isset($_POST['category_vn'])) {
			$data_array =  array(
				"id" => $_POST['id'],
				"category_vn" => (string)($_POST['category_vn']),
				"category_en" => (string)($_POST['category_en'])
			);
			
			$url = '';
			if ($_POST['id']) {
				$url .= '/api/category/update.php';
			}else {
				$url .= '/api/category/create.php';
			}

            $get_data = callAPI('POST', $url, json_encode($data_array));
			$response = json_decode($get_data, true);
			$create = $response['message'];
			echo $create;
			echo "<script>window.open('index.php?page=categories','_self')</script>";
		} else if (isset($_GET['id'])) {
			$get_data = callAPI('GET', '/api/category/read_one.php?id='.(string)($_GET['id']), null);
			$response = json_decode($get_data, true);
			$data = $response;
		}
		
		$get_data = callAPI('GET', '/api/category/read.php', null);
		$response = json_decode($get_data, true);
		$categories = $response['records'];

		?>
		<form action="index.php?page=categories&type=create" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo  $data['id'] ?>"/>
			<div class="tab">
				<button type="button" class="tablinks" onclick="openCity(event, 'vn')" id="defaultOpen">Tiếng Việt</button>
				<button type="button" class="tablinks" onclick="openCity(event, 'en')">English</button>
			</div>
			<div id="vn" class="tabcontent">
				Tiêu đề: <input type="text" name="category_vn" value="<?php echo $data['category_vn'] ?>"/><br/>
			</div>
			<div id="en" class="tabcontent">
				Title:
				<input type="text" name="category_en" value="<?php echo $data['category_en'] ?>"/><br/>
			</div>
			<input type="submit" value="Submit"/>
		</form>
		<script>
			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>
	</div>
</div>
