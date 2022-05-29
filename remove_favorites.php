<?php
	require_once 'dbconfig.php';
    session_start();
	
	$curl = curl_init(); 
	
	if(!isset($_GET["param"])){
		header(Location: "home.php");
		exit();
	}

	$search_param = $_GET["param"];
	
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
	
	$query = "DELETE from favorites where id = '$search_param'";
	
	mysqli_query($conn, $query);

?>