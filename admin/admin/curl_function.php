<?php	
	
	function console_log( $data ){
		echo '<script>';
		echo 'console.log('. json_encode( $data ) .')';
		echo '</script>';
	}

	function callAPI($method, $url, $data){		
		$API_URL = 'http://localhost:8888/trung-architect';
		
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
		$result = curl_exec($curl);
		if(!$result){die("Connection Failure");}
		curl_close($curl);
		return $result;
	}
	
	function filetowrite($filetowrite, $temp) {
		$imageFolder = "../images/";
		$now = new DateTime(null, new DateTimeZone('America/New_York'));
		if ($temp['name']){
			$filetowrite = $imageFolder . ($now->getTimestamp()) . '-' . $temp['name'];
			move_uploaded_file($temp['tmp_name'], $filetowrite);
		}
		return $filetowrite;
	}
?>	