<?php
	session_start();
	// On redirige l'utilisateur s'il n'est pas connecté en tant qu'administrateur
	if($_SESSION[masterpass] != 'ba45712c1efa4d68f5907f7bf74abb091567c6c3')
		header("location: ../login.php");

	function printFooter() {
		echo "</body></html>";
	}

	//Connexion à la base de donnée
	if (!$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8"))
		echo "<p class='error'>Connexion error.</p>";
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Administration panel</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<div id="nav">
			<div>Administrator panel</div>
			<div><a href='./newlaptop.php'>Add a laptop</a></div>
			<div><a href='manageaccessories.php'>Accessories</a></div>
			<div><a href='./manageproducts.php'>Manage stocks</a></div>
			<div><a href='./managecustomers.php'>Manage customers</a></div>
			<div><a href='./orders.php'>View orders</a></div>
			<div><a href='../logout.php'>Log out</a></div>
		</div>
