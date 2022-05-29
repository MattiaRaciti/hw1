<?php
    require_once 'dbconfig.php';
    session_start();  

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["confirm_password"]))
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$query = "SELECT username FROM users WHERE username='".$_POST["username"]."'";
		$res = mysqli_query($conn, $query);
		if (mysqli_num_rows($res) > 0) {
			$error = "";	
		}
		
        if(!preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,16}$/", $_POST["password"]))
		{
            $error = "La password non rispetta le specifiche richieste";
        } else {
			if (strlen($_POST["password"]) < 8) {
				$error = "Caratteri password insufficienti";
			}
			$password = mysqli_real_escape_string($conn, $_POST['password']);
		}
		
		
		if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error = "Le password non coincidono";
        }
		

        if ($error == 0) {

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, password) VALUES('$username', '$password')";
            
            if (mysqli_query($conn, $query)) {
				$_SESSION["username"] = $username;
				
                header("Location: home.php");
				mysqli_close($conn);
                exit;
            } else {
                $error = "Errore di connessione al Database";
            }
        }
        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = "Riempi tutti i campi";
	}
?>


<html>
    <head>
        <link rel='stylesheet' href='./style/signup.css'>
        <script src='./scripts/signup.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title>PicturesDB - Registrazione</title>
    </head>
    <body>
        <main>
			<header>
			</header>
        <section class="main_picturesDB">
			<h1>PicturesDB</h1>
			<div id = "details">
				<motto> Colleziona immagini e condividile con i tuoi amici!</motto>
			</div>
            <h2>REGISTRAZIONE</h2>
			<div id = "details">
				<p> ATTENZIONE: la password deve contenere minimo 8 caratteri e almeno un numero, una lettera maiuscola, una lettera minuscola e un carattere speciale.</p>
			</div>
			
			<?php
                if (isset($error)) {
						echo "<span class='error'>$error</span>";
					}
            ?>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                    <span class = "error" ></span>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                    <span class = "error" ></span>
                </div>
				
				<div class="confirm_password">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>></div>
                    <span class = "error" ></span>
                </div>
             
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Possiedi già un account? <a href="login.php" class="button" >Accedi</a>
        </section>
			<footer>
				<p>Realizzato da: <strong>Mattia Raciti 1000001206</strong></p>
			</footer>
        </main>
    </body>
</html>