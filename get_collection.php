<?php
	require_once 'dbconfig.php';
	session_start();
	
	if(!isset($_SESSION["username"])){
		header(Location: "login.php");
		exit();
	}
	
	$search_param = $_GET["param"];
	
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
	$query = "SELECT * FROM favorites WHERE username='".$search_param."'";
	$res = mysqli_query($conn, $query);
	if (mysqli_num_rows($res) > 0) {
	  $success = true;
	  $content = array();
	  while ($row = mysqli_fetch_assoc($res)) {
		$content[] = $row;
	  }
	} else {
	  $success = false;
	  $content = "Non ci sono immagini da visualizzare :(";
	}
	
	$query_like = "SELECT * FROM likes WHERE mittente='".$_SESSION["username"]."' AND destinatario='".$search_param."'";
	
	$res_like = mysqli_query($conn, $query_like);
	if (mysqli_num_rows($res_like) > 0) {
	  $like_presente = true;
	} else {
	  $like_presente = false;
	}
	
	$response = ['success' => $success, 'content' => $content, 'like_presente' => $like_presente];
	echo json_encode($response);
?>