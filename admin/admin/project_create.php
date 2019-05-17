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
	<h1 align="center">Create Project</h1>
	<div class="table-responsive">
		<?php
		if (isset($_POST['title_vn'])) {
			$photo_array = array();
			$photo_count = count($_POST['description_vn']);
			// echo json_encode($_FILES['image_link']);

			if ($photo_count > 0) {
				$files = reArrayFiles($_FILES['image_link']);
				for ($i = 0; $i < $photo_count; $i++) {
					$data = array(
						"id" => $_POST['image_id'][$i],
						"image_link" => (string)(filetowrite($_POST['_image_link'][$i],$files[$i])),
						"description_vn" => (string)($_POST['description_vn'][$i]),
						"description_en" => (string)($_POST['description_en'][$i]),
						"display" => 1
					);
					
					array_push($photo_array, $data);
				}
			}
			$metadata_vn = array(
				"location" => (string)($_POST['location_vn']),
				"size" => (string)($_POST['size_vn']),
				"status" => (string)($_POST['status_vn']),
				"client" => (string)($_POST['client_vn'])
			);
			$metadata_en = array(
				"location" => (string)($_POST['location_en']),
				"size" => (string)($_POST['size_en']),
				"status" => (string)($_POST['status_en']),
				"client" => (string)($_POST['client_en'])
			);

			$data_array =  array(
				"id" => $_POST['id'],
				"category_id" => $_POST['category_id'],
				"image0" => (string)(filetowrite($_POST['_image0'],$_FILES['image0'])),
				"image1" => (string)(filetowrite($_POST['_image1'],$_FILES['image1'])),
				"image2" => (string)(filetowrite($_POST['_image2'],$_FILES['image2'])),
				"image3" => (string)(filetowrite($_POST['_image3'],$_FILES['image3'])),
				"title_vn" => (string)($_POST['title_vn']),
				"subtitle_vn" => (string)($_POST['subtitle_vn']),
				"content_vn" => htmlentities($_POST['content_vn']),
				"title_en" => (string)($_POST['title_en']),
				"subtitle_en" => (string)($_POST['subtitle_en']),
				"content_en" => htmlentities($_POST['content_en']),
				"metadata_vn" => $metadata_vn,
				"metadata_en" => $metadata_en,
				"project_images" => $photo_array
			);
			
			$url = '';
			if ($_POST['id']) {
				$url .= '/api/project/update.php';
			}else {
				$url .= '/api/project/create.php';
			}

			// echo "<br>" . json_encode($data_array);
			$get_data = callAPI('POST', $url, json_encode($data_array));
			$response = json_decode($get_data, true);
			$create = $response['message'];
			echo "<br>".$create;
			echo "<script>window.open('index.php?page=projects','_self')</script>";
		} else if (isset($_GET['id'])) {
			$get_data = callAPI('GET', '/api/project/read_one.php?id='.(string)($_GET['id']), null);
			$data = json_decode($get_data, true);

			$get_data = callAPI('GET', '/api/projectImage/read_by_project.php?id='.(string)($_GET['id']), null);
			$response = json_decode($get_data, true);
			$photoImages = $response['records'];
		} 
		
		$get_data = callAPI('GET', '/api/category/read.php', null);
		$response = json_decode($get_data, true);
		$categories = $response['records'];

		?>
		<form action="index.php?page=projects&type=create" method="post" enctype="multipart/form-data">
			Chọn danh mục: 
			<select name="category_id">
				<?php
					foreach((array)$categories as $item) {
						?>
						<option value="<? echo $item['id']?>" <? echo $item['id'] == $data['category_id'] ? 'selected' : ''; ?>>
							<? echo $item['category_vn'] ?>
						</option>
						<?php
					}
				?>
			</select>
			<br/>
			<input type="hidden" name="id" value="<?php echo  $data['id'] ?>"/>
			<div class="tab">
				<button type="button" class="tablinks" onclick="openCity(event, 'vn')" id="defaultOpen">Tiếng Việt</button>
				<button type="button" class="tablinks" onclick="openCity(event, 'en')">English</button>
			</div>
			<div id="vn" class="tabcontent vn">
				Tiêu đề: <input type="text" name="title_vn" value="<?php echo $data['title_vn'] ?>"/><br/>
				Giới thiệu: <textarea name="subtitle_vn" rows="4" style="width: 100%"><?php echo $data['subtitle_vn'] ?></textarea><br/>
				Địa điểm: <input type="text" name="location_vn" value="<?php echo $data['metadata_vn']['location'] ?>"/><br/>
				Kích cỡ: <input type="text" name="size_vn" value="<?php echo  $data['metadata_vn']['size'] ?>"/><br/>
				Trạng thái: <input type="text" name="status_vn" value="<?php echo  $data['metadata_vn']['status'] ?>"/><br/>
				Khách hàng:<input type="text" name="client_vn" value="<?php echo  $data['metadata_vn']['client'] ?>"/><br/>
				Nội dung:<br/>
				<textarea id="content_vn" name="content_vn"><?php echo $data['content_vn'] ?></textarea><br/>
			</div>
			<div id="en" class="tabcontent en">
				Title:
				<input type="text" name="title_en" value="<?php echo $data['title_en'] ?>"/><br/>
				Short description:
				<textarea name="subtitle_en" rows="4" style="width: 100%"><?php echo $data['subtitle_en'] ?></textarea><br/>
				Location: <input type="text" name="location_en" value="<?php echo $data['metadata_en']['location'] ?>"/><br/>
				Size: <input type="text" name="size_en" value="<?php echo  $data['metadata_en']['size'] ?>"/><br/>
				Status: <input type="text" name="status_en" value="<?php echo  $data['metadata_en']['status'] ?>"/><br/>
				Client:<input type="text" name="client_en" value="<?php echo  $data['metadata_en']['client'] ?>"/><br/>
				Content:
				<textarea id="content_en" name="content_en"><?php echo $data['content_en'] ?></textarea></<br/>
			</div>
			<div id="projectPhotos">
				<h4>Project photos
				<a class="btn btn-danger" onclick="addImage()"> +</a></h4>
				<?php
					$photoIndex = 0;
					// echo json_encode($photoImages);
					foreach((array)$photoImages as $item) {
						?>
						<table style="width: 100%" id="photo<?echo $photoIndex;?>">
							<tr>
								<td style="width: 30%">
									<img src="<?echo $item['image_link']?>" style="width: 100%; max-height: 100%;"/>
									<input type="hidden" name="image_id[]" value="<?php echo  $item['id'] ?>"/>
									
									<input type="file" name="image_link[]"/>
									<input type="hidden"name="_image_link[]" value="<?php echo $item['image_link']?>"/>
								</td>
								<td><a class="btn btn-danger" onclick="removeImage('photo<?echo $photoIndex;?>', <?php echo  $item['id'] ?>)">-</a>
									<div id="vn" class="tabContent vn">
									Giới thiệu: <textarea name="description_vn[]" rows="4" style="width: 100%"><?php echo $item['description_vn'] ?></textarea><br/>
									</div>
									<div id="en" class="tabContent en">
									Description: <textarea name="description_en[]" rows="4" style="width: 100%"><?php echo $item['description_en'] ?></textarea><br/>
									</div>
								</td>
							</tr>
						</table>
						<?php
						$photoIndex++;
					}
				?>
			</div>
			<input type="submit" class="button" value="Submit"/>
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
				var i, tabcontent, tablinks, cityTabs;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				
				// document.getElementById(cityName).style.display = "block";
				cityTabs = document.getElementsByClassName(cityName);
				for (i = 0; i < cityTabs.length; i++) {
					cityTabs[i].style.display = "block";
				}
				evt.currentTarget.className += " active";
			}
			var photoIndex = <?echo $photoIndex;?>;
			function addImage() {
				var container = document.getElementById('projectPhotos'),
				thingId = 'test-id', 
				thingClass = 'test-class',
				htmlString = '';
			
				// construct a html string with the class names and id you want 
				htmlString += '<table style="width: 100%" id="photo' + photoIndex + '">';
				htmlString += '	<tr>';
				htmlString += '		<td style="width: 30%">';
				htmlString += '			<input type="file" name="image_link[]"/>';
				htmlString += '			<input type="hidden"name="_image_link[]" value=""/>';
				htmlString += '		</td>';
				htmlString += '		<td>';
				htmlString += '			<a class="btn btn-danger" onclick="removeImage(\'photo' + photoIndex +'\')">-</a>';
				htmlString += '			<div id="vn" class="tabContent vn">';
				htmlString += '				Giới thiệu: <textarea name="description_vn[]" rows="4" style="width: 100%"></textarea><br/>';
				htmlString += '			</div>';
				htmlString += '			<div id="en" class="tabContent en">';
				htmlString += '				Description: <textarea name="description_en[]" rows="4" style="width: 100%"></textarea><br/>';
				htmlString += '			</div>';
				htmlString += '		</td>';
				htmlString += '	</tr>';
				htmlString += '</table>';
				
				container.insertAdjacentHTML('beforeend', htmlString); 
				
				// container.insertAdjacentHTML('afterend', htmlString); 
				document.getElementById("defaultOpen").click();
				photoIndex = photoIndex + 1;
			}

			function removeImage(name, imageId) {
				if (imageId) {
					$.ajax({
						type: "POST",
						url: 'http://<? echo $_SERVER['HTTP_HOST']?>/api/projectImage/delete.php',
						data: JSON.stringify({ id: imageId }),
						contentType: "application/json; charset=utf-8",
						dataType: "json",
						success: function(data){
							if('SUCCESS' != data.result) {
								alert("Cannot delete this image in database!");
							} else {								
								document.getElementById(name).remove();
							};
						}
					});
				} else {
					document.getElementById(name).remove();
				}
			}

			// Get the element with id="defaultOpen" and click on it
			document.getElementById("defaultOpen").click();
		</script>
	</div>
</div>
