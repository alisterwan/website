<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Registration</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php
			$name     = $_POST["name"];
			$address  = $_POST["address"];
			$user = $_POST["username"];
			$pass     = $_POST["password"];

			if ($_POST["password"] != $_POST["passcheck"]) {
					echo "Wrong password.";
					exit;
			}
			//Connexion à la base de donnée
			$conn = new PDO("pgsql:host=sqletud.univ-mlv.fr;dbname=jwankutk_db","jwankutk","Tqeouoe8");
			if (!$conn) {
				echo "Connexion error.";
				exit;
			}

			// Ajout d'un nouveau client dans la base de donnée
			$result = pg_query($conn, "INSERT INTO customers(name,address,username,password) values('$name','$address','$user','$pass')");
			if(!$result){
				echo "Error during registration.\n";
				exit;
			}

echo "test2";

//Envoie du mail de confirmation de l'inscription
     $headers ='From: "laptopmlv"<laptopmlv@gmail.com>'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';
$to=$_POST['username'];

     if(mail($to,"Registration to LMLV","You have been correctly registered.", $headers))
     {
          echo '<br>';
          echo 'An email of confirmation has been sent.';
          echo '<br>';
          header("Location refresh=3:http://www.gmail.com");
     }
     else
     {
          echo 'The email has not been sent.';
     }
?>

	</body>
</html>
