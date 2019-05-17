<?php	
	
	function console_log( $data ){
		echo '<script>';
		echo 'console.log('. json_encode( $data ) .')';
		echo '</script>';
	}

	function callAPI($method, $url, $data){	
		$API_URL = $_SERVER['HTTP_HOST'];
		
		$url = $API_URL . $url;
		$curl = curl_init();
		switch ($method){
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                         
				break;
			default:
				if ($data)
					$url = sprintf("%s?%s", $url, http_build_query($data));
		}
		// OPTIONS:
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 111111111111111111111',
			'Content-Type: application/json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		
		// EXECUTE:
		$i = 0;
		$result = false;
		do {
			$result = curl_exec($curl);
		} while (!$result && $i < 5);

		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return $result;
	}
	
	function filetowrite($filetowrite, $temp) {
		$imageFolder = "../images/";
		$now = new DateTime(null, new DateTimeZone('America/New_York'));
		if (strlen($filetowrite) > 0) {
			!unlink($filetowrite);
		} 
		if ($temp['name']){
			$filetowrite = $imageFolder . ($now->getTimestamp()) . '-' . $temp['name'];
			// move_uploaded_file($temp['tmp_name'], $filetowrite);
			compress_image($temp['tmp_name'], $filetowrite, 80);
		}
		return $filetowrite;
	}

	function reArrayFiles(&$file_post) {

		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);
	
		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}
	
		return $file_ary;
	}

	function compress_image($source_url, $destination_url, $quality) {
		$info = getimagesize($source_url);

		if ($info['mime'] == 'image/jpeg')
				$image = imagecreatefromjpeg($source_url);

		elseif ($info['mime'] == 'image/gif')
				$image = imagecreatefromgif($source_url);

		elseif ($info['mime'] == 'image/png')
				$image = imagecreatefrompng($source_url);

		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}
?>	