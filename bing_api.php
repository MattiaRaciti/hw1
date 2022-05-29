	<?php
	$curl = curl_init(); 
	
	$search_param = $_GET["param"];
	
	curl_setopt_array($curl, [
		CURLOPT_URL => "https://bing-image-search1.p.rapidapi.com/images/search?q=$search_param",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"X-RapidAPI-Host: bing-image-search1.p.rapidapi.com",
			"X-RapidAPI-Key: 9d303c9a33msh1c49b8e3844c91fp1f2a07jsnc53c380992bd"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	}
	else{;
		echo $response;
	}
	?>