<?php
	require_once 'dbconfig.php';
	$search_param = $_GET["param"];
	
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
	$query = "SELECT * FROM users WHERE username='".$search_param."'";
	$res = mysqli_query($conn, $query);
	if (mysqli_num_rows($res) > 0) {
	  $gia_presente = true;
	  $content = array();
	  while ($row = mysqli_fetch_assoc($res)) {
		$content[] = $row;
	  }
	} else {
	  $gia_presente = false;
	  $content = "";
	}
	
	$response = ['gia_presente' => $gia_presente, 'content' => $content];
	echo json_encode($response);
?>