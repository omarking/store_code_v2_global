<?php

	$url = 'https://apis-sandbox.fedex.com/oauth/token';
	$method = 'POST';
	$headers = array(
		"Content-Type:application/x-www-form-urlencoded",
	);
	$body ="grant_type=client_credentials&client_id=l73bf6512079ed4c67b614d00e6f8d99ee&client_secret=ddac799e52ee491d8570768776fbb605";
		
	$curl = curl_init();
		
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL => $url,
		CURLOPT_CUSTOMREQUEST => $method,
		CURLOPT_HTTPHEADER => $headers,
		CURLOPT_POSTFIELDS => $body
	));
		
	$response = curl_exec($curl);
	$err = curl_error($curl);
		
	curl_close($curl);
		
	if ($err) {
		echo "cURL Error #:" . $err;
	}else{
		//echo $response;
	}

	$json = $response;
	$obj  = json_decode($json);
	$token = $obj->{'access_token'};
	//print($token);
?>