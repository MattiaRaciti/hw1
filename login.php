<?php

	require_once 'dbconfig.php';
    session_start();

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $query = "SELECT username, password FROM users WHERE username = '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        if (mysqli_num_rows($res) > 0) {

            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {
				$_SESSION["username"] = $entry['username'];
				
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>


<html>
    <head>
        <link rel='stylesheet' href='./style/login.css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PicturesDB - Login</title>
    </head>
    <body>
        <main class="login">
        <section class="main_piscturesDB">
			<h1>PicturesDB</h1>
			<div id = "details">
				<motto> Colleziona immagini e condividile con i tuoi amici!</motto>
			</div>
            <h3>ACCEDI</h3>
            <?php
                if (isset($error)) {
                    echo "<span class='error'>$error</span>";
                }
                
            ?>
            <form name='login' method='post'>
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                </div>
                <div class="submit">
                    <input type='submit' value="Accedi" id = "submit">
                </div>
            </form>
            <div class="signup">Non hai un account? <a href="signup.php" class = "button">Iscriviti</a>
        </section>
        </main>
		<footer>
			<p>Realizzato da: <strong>Mattia Raciti 1000001206</strong></p>
		</footer>
    </body>
</html>
