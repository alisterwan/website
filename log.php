<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Login</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="john wan kut kai" >
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
<?php
$user = $_POST["username"];
$pass = $_POST["password"];

	//Connexion à la base de donnée
			$conn = new PDO("pgsql:host=sqletud.univ-mlv.fr;dbname=jwankutk_db","jwankutk","Tqeouoe8");
			if (!$conn) {
				echo "Connexion error.";
				exit;
			}
//Verification du client dans la base de donnée
$result = $conn -> query("SELECT (username,password) from customers where username='$user' and password='$pass'"); 
	
			if(!$result) {
				echo "Query error";
			} 
else echo "Authenfication reussie.";
?>
	</body>
</html>
