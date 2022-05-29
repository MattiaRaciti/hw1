<?php
	require_once 'dbconfig.php';
    session_start();

	$curl = curl_init(); 

	$search_param = $_GET["param"];
	
	if(!isset($_SESSION["username"])){
		header(Location: "login.php");
		exit();
	}
	
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
	$query = "SELECT username, since from users WHERE username like '".$search_param."'";
	
	$res = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($res) > 0) {
	  $success = true;
	  $content = array();
	  while ($row = mysqli_fetch_assoc($res)) {
		$content[] = $row;
	  }
	} else {
	  $success = false;
	  $content = "Non ci sono utenti da visualizzare :(";
	}
	
	$response = ['success' => $success, 'content' => $content];
	echo json_encode($response);
?>