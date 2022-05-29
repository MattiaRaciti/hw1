<?php

	require_once 'dbconfig.php';
    session_start();

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die("Errore: ".mysqli_connect_error());
    $query = "SELECT * FROM users";

    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
	
	if(isset($_SESSION["username"]))
	{
		$usr = $_SESSION["username"];
	}
	else{
		$errore_sessione = true;
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PicturesDB - home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/home.css">
	<script src="scripts/home.js" defer="true"></script>
  </head>
  <body>
    <header>
      <nav>
        <div id="links">
			<a2>PicturesDB</a2>
			<a href="home.php" class="button">Clear</a>
			<a href="preferiti.php" class="button">Preferiti</a>
			<a href="logout.php" class="button_b">Logout</a>
			<div id = "details">
			</div>
        </div>
		<div id="menu"> 
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>

      <h1>
        <strong>Ricerca Immagini</strong><br/>
		<em>Colleziona immagini e condividile con i tuoi amici!</em><br/>
		<?php echo "<br><a3> Benvenuto $usr !</a3></br>"; ?>
      </h1>
    </header>
	
	<section id = "search-view">
		<form>
			<label>Cerca: <input type='text' name = 'content' id ='content'></label>	
				<select name = 'tipo' id='tipo'>
				<option value='image'>Immagine</option>
				<option value='user'>Utente</option>
			</select>
			<label>&nbsp;<input class="submit" type='submit'></label>
		<form/>
	</section>
	
	<section id = "header-view">
	</section>
	
	<section id = "library-view">
	</section>
	  
    <footer>
      <address>Powered by: Bing Image Search</address>
      <p>Realizzato da: <strong>Mattia Raciti 1000001206</strong></p>
    </footer>
  </body>
</html>


