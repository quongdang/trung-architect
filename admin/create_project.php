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
		<title>Create Project</title>
	</head>
	<style>
		.login-panel {
			margin-top: 150px;
		}
		.table {
			margin-top: 50px;

		}

        body {
            margin: 50px;
        }
		
		#vn, #en {
			width:100%;
			positon: relative;
		}
        #vn input, #en input {
            margin-bottom:5px;
            width: 100%;
        }

        .appear {
            display: none;
        }
	</style>
    <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        function toogleDisplayContent() {
            var en = document.getElementById("en");
            en.classList.toggle("appear");

            var vn = document.getElementById("vn");
            vn.classList.toggle("appear");
        }
    </script>

	<body>
		<div class="table-scrol">
			<h1 align="center">Create Project</h1>
			<div class="table-responsive">
                <?php
                if (isset($_POST['title_vn'])) {
					$filetowrite = $_POST['oldImage'];
					$temp = $_FILES['imageUpload'];
					if ($temp['name']){
						$now = new DateTime(null, new DateTimeZone('America/New_York'));
						$now->setTimezone(new DateTimeZone('Europe/London'));    // Another way
						
						$imageFolder = "images/";
						$filetowrite = $imageFolder . ($now->getTimestamp()) . '-' . $temp['name'];
						move_uploaded_file($temp['tmp_name'], $filetowrite);
					}
                    $data_array =  array(
                        "id" => $_POST['id'],
						"image" => (string)($filetowrite),
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
                    echo "<script>window.open('projects.php','_self')</script>";
                } else if (isset($_GET['id'])) {
                    $get_data = callAPI('GET', '/api/project/read_one.php?id='.(string)($_GET['id']), null);
                    $response = json_decode($get_data, true);
                    $data = $response;
                }
                ?>
				<form action="create_project.php" method="post"  enctype="multipart/form-data">
					
					<div style="float:left; width: 65%">
						Chọn kiểu nhập nội dung
						<input type="radio" value="vn" checked onclick="toogleDisplayContent()"> Tiếng Việt
						<input type="radio" value="en" onclick="toogleDisplayContent()"> English
						<br/>
						<input type="hidden" name="id" value="<?php echo  $data['id'] ?>"/>
						Chọn hình đại diện (Select project's image): <input type="file" name="imageUpload"/>
						<input type="hidden"name="oldImage" value="<?php echo $data['image']?>"/>							
					</div>
					<?php
					if($data['image']) {
						?>
							<img src="<?php echo $data['image']?>" width=100px height=100px style="float:right; width:30%"/>
						<?php
						}
					?>
					
					<div style="clear:both"/>
                    <div id="vn">
                        Tiêu đề: <input type="text" name="title_vn" value="<?php echo $data['title_vn'] ?>"/><br/>
                        Địa điểm: <input type="text" name="subtitle_vn" value="<?php echo $data['subtitle_vn'] ?>"/><br/>
                        Nội dung:<br/>
                        <textarea id="content_vn" name="content_vn"><?php echo $data['content_vn'] ?></textarea><br/>
                    </div>
                    <div id="en" class="appear">
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
                </script>
			</div>
		</div>
	</body>
</html>
