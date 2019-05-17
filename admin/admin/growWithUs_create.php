<?php
	if(!$_COOKIE['jwt'])
	{

		header("Location: index.php");//redirect to login page to secure the welcome page without login access.
	}
	
	include_once('curl_function.php');
?>

<link type="text/css" rel="stylesheet" href="css/create_project.css">
<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	function toogleDisplayContent() {
		var en = document.getElementById("en");
		en.classList.toggle("appear");

		var vn = document.getElementById("vn");
		vn.classList.toggle("appear");
	}
</script>
<div class="table-scrol">
	<h1 align="center">Create Grow With Us</h1>
	<div class="table-responsive">
		<?php
		if (isset($_POST['title_vn'])) {
			$data_array =  array(
				"id" => $_POST['id'],
				"title_vn" => (string)($_POST['title_vn']),
				"content_vn" => htmlentities($_POST['content_vn']),
				"title_en" => (string)($_POST['title_en']),
				"content_en" => htmlentities($_POST['content_en'])
			);
			
			$url = '';
			if ($_POST['id']) {
				$url .= '/api/growWithUs/update.php';
			}else {
				$url .= '/api/growWithUs/create.php';
			}

			$get_data = callAPI('POST', $url, json_encode($data_array));
			$response = json_decode($get_data, true);
			$create = $response['message'];
			echo $create;
			echo "<script>window.open('index.php?page=growWithUs','_self')</script>";
		} else if (isset($_GET['id'])) {
			$get_data = callAPI('GET', '/api/growWithUs/read_one.php?id='.(string)($_GET['id']), null);
			$response = json_decode($get_data, true);
			$data = $response;
		}

		?>
		<form action="index.php?page=growWithUs&type=create" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo  $data['id'] ?>"/>
			<div style="clear:both"/>

			<div class="tab">
				<button type="button" class="tablinks" onclick="openCity(event, 'vn')" id="defaultOpen">Tiếng Việt</button>
				<button type="button" class="tablinks" onclick="openCity(event, 'en')">English</button>
			</div>
			<div id="vn" class="tabcontent">
				Tiêu đề: <input type="text" name="title_vn" value="<?php echo $data['title_vn'] ?>"/><br/>
				Nội dung:<br/>
				<textarea id="content_vn" name="content_vn"><?php echo $data['content_vn'] ?></textarea><br/>
			</div>
			<div id="en" class="tabcontent">
				Title:
				<input type="text" name="title_en" value="<?php echo $data['title_en'] ?>"/><br/>
				Content:
				<textarea id="content_en" name="content_en"><?php echo $data['content_en'] ?></textarea></<br/>
			</div>
			<input type="submit" value="Submit"/>
		</form>
		<script>
			tinymce.init({
				selector: '#content_vn',
				plugins: 'image code',
				toolbar: 'undo redo | image code',
				automatic_uploads: true,
				images_upload_url: 'postAcceptor.php'
			});
			tinymce.init({
				selector: '#content_en',
				plugins: 'image code',
				toolbar: 'undo redo | image code',
				automatic_uploads: true,
				images_upload_url: 'postAcceptor.php'
			});
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
