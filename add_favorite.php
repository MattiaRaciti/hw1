<?php
	require_once 'dbconfig.php';
    session_start();
	
	$curl = curl_init(); 
	
	if(!isset($_GET["param"])){
		header(Location: "home.php");
		exit();
	}
	
	if(!isset($_SESSION["username"])){
		header(Location: "login.php");
		exit();
	}
	
	$search_param = $_GET["param"];
	echo $search_param;
	print_r ($search_param);
	$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
	mysqli_query($conn, "INSERT INTO favorites(url, username) VALUES('".$search_param."', '".$_SESSION["username"]."');");
?>