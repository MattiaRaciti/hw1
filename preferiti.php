<?php
	require_once 'dbconfig.php';
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Preferiti</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="style/preferiti.css">
		<script src="scripts/preferiti.js" defer="true"></script>
	</head>
		<header>
			<div>
				<h1>
					<strong>Ecco i tuoi preferiti:</strong>
				</h1>
			</div>
		</header>
		
		<nav id="links">
			<a href="home.php" class="button">Indietro</a>
		</nav>
		<section id = "error-view">
		
		</section>
		
		<section id = "library-view">
		
		</section>
	<body>
</html>

<section id = "library-view">
  </section>