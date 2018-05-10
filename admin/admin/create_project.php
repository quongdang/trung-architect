<?php
	session_start();

	if(!$_SESSION['email'])
	{

		header("Location: admin.php");//redirect to login page to secure the welcome page without login access.
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
	<h1 align="center">Create Project</h1>
	<div class="table-responsive">
		<?php
		function filetowrite($filetowrite, $temp) {
			$imageFolder = "images/";
			$now = new DateTime(null, new DateTimeZone('America/New_York'));
			if ($temp['name']){
				$filetowrite = $imageFolder . ($now->getTimestamp()) . '-' . $temp['name'];
				move_uploaded_file($temp['tmp_name'], $filetowrite);
			}
			return $filetowrite;
		}
		if (isset($_POST['title_vn'])) {
			$data_array =  array(
				"id" => $_POST['id'],
				"image0" => (string)(filetowrite($_POST['_image0'],$_FILES['image0'])),
				"image1" => (string)(filetowrite($_POST['_image1'],$_FILES['image1'])),
				"image2" => (string)(filetowrite($_POST['_image2'],$_FILES['image2'])),
				"image3" => (string)(filetowrite($_POST['_image3'],$_FILES['image3'])),
				"title_vn" => (string)($_POST['title_vn']),
				"subtitle_vn" => (string)($_POST['subtitle_vn']),
				"content_vn" => htmlentities($_POST['content_vn']),
				"title_en" => (string)($_POST['title_en']),
				"subtitle_en" => (string)($_POST['subtitle_en']),
				"content_en" => htmlentities($_POST['content_en'])
			);
			
			$url = '';
			if ($_POST['id']) {
				$url .= '/api/project/update.php';
			}else {
				$url .= '/api/project/create.php';
			}

			$get_data = callAPI('POST', $url, json_encode($data_array));
			$response = json_decode($get_data, true);
			$create = $response['message'];
			echo $create;
			echo "<script>window.open('admin.php','_self')</script>";
		} else if (isset($_GET['id'])) {
			$get_data = callAPI('GET', '/api/project/read_one.php?id='.(string)($_GET['id']), null);
			$response = json_decode($get_data, true);
			$data = $response;
		}
		?>
		<form action="admin.php?page=create_project" method="post" enctype="multipart/form-data">
			Chọn kiểu nhập nội dung
			<input type="radio" name="language" value="vn" checked onclick="toogleDisplayContent()"> Tiếng Việt
			<input type="radio" name="language" value="en" onclick="toogleDisplayContent()"> English
			<br/>
			<input type="hidden" name="id" value="<?php echo  $data['id'] ?>"/>
			Upload Images:
			<div>
				<?php
				for ($i = 0; $i<6; $i++) {
					if($data['image'.$i]) {
						?>
							<img src="<?php echo $data['image'.$i]?>" style="height:200px; max-width: 200px; float: left; padding-left:5px"/>
						<?php
					}
				}

				?>
			</div>

			<div style="clear:both"/>
			<input type="file" name="image0"/>
			<input type="hidden"name="_image0" value="<?php echo $data['image0']?>"/>

			<input type="file" name="image1"/>
			<input type="hidden"name="_image1" value="<?php echo $data['image1']?>"/>

			<input type="file" name="image2"/>
			<input type="hidden"name="_image2" value="<?php echo $data['image2']?>"/>

			<input type="file" name="image3"/>
			<input type="hidden"name="_image3" value="<?php echo $data['image3']?>"/>

			<div style="clear:both"/>

			<div class="tab">
				<button type="button" class="tablinks" onclick="openCity(event, 'vn')" id="defaultOpen">Tiếng Việt</button>
				<button type="button" class="tablinks" onclick="openCity(event, 'en')">English</button>
			</div>
			<div id="vn" class="tabcontent">
				Tiêu đề: <input type="text" name="title_vn" value="<?php echo $data['title_vn'] ?>"/><br/>
				Địa điểm: <input type="text" name="subtitle_vn" value="<?php echo $data['subtitle_vn'] ?>"/><br/>
				Nội dung:<br/>
				<textarea id="content_vn" name="content_vn"><?php echo $data['content_vn'] ?></textarea><br/>
			</div>
			<div id="en" class="tabcontent">
				Title:
				<input type="text" name="title_en" value="<?php echo $data['title_en'] ?>"/><br/>
				Subtitle:
				<input type="text" name="subtitle_en" value="<?php echo $data['subtitle_en'] ?>"/><br/>
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
