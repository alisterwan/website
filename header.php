<?php
	session_start();

	// Connexion à la base de donnée
	if (!$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8"))
		echo "<p class='error'>Connexion error.</p>";

	// Affiche l'entête
	function printHeader($title) {

		// Affiche le nom d'utilisatuer s'il est connecté et un lien vers sa page perso.
		if ($_SESSION[name])
			$html = "<span id='log'>Welcome <a href='./account.php'>$_SESSION[name]</a>. <a href='./logout.php'>Log out</a>.</span>";
		// Sinon, afficher un lien pour se connecter.
		else
			$html = "<span id='log'>Welcome. <a href='./login.php'>Log in</a> or <a href='./registration.php'>register</a>.</span>";

		echo "
<!doctype html>
<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
		<title>$title</title>
		<meta name='description' content='Projet web'>
		<meta name='author' content='Alister & Mayhem'>
		<link rel='stylesheet' href='stylesheet.css'>
	</head>
	<body>
		<div id='header'>
			<a href='./index.php'><img src='laptop.png' id='logo'></a>
			<img src='MLV.png' id='mlv'>
			$html
			<a href='./cart.php' id='cart'>Cart <img src='cart.png'></a>
		</div>
		<div id='nav'>
			<a href='./index.php'>Home</a>
			<a>Brands</a>
			<div>
				<a href='./brands.php?brand=Acer'>Acer</a>
				<a href='./brands.php?brand=Asus'>Asus</a>
				<a href='./brands.php?brand=Apple'>Apple</a>
				<a href='./brands.php?brand=Dell'>Dell</a>
				<a href='./brands.php?brand=HP'>Hewlett&nbsp;Packard</a>
				<a href='./brands.php?brand=Toshiba'>Toshiba</a>
				<a href='./brands.php?brand=Samsung'>Samsung</a>
			</div>
			<a>Categories</a>
			<div>
				<a href='./type.php?type=Netbook'>Netbook</a>
				<a href='./type.php?type=Notebook'>Notebook</a>
				<a href='./type.php?type=Performance'>Performance</a>
				<a href='./type.php?type=Multimedia'>Multimedia</a>
				<a href='./type.php?type=Gamers'>Gamers</a>
			</div>
			<a>Accessories</a>
			<div>
				<a href='./chargers.php'>Battery&nbsp;chargers</a>
				<a href='./usbs.php'>USB&nbsp;Flash&nbsp;Drive</a>
				<a href='./laptopcases.php'>Laptop&nbsp;case</a>
				<a href='./printers.php'>Printers</a>
			</div>
			<a href='./aboutus.php'>About us</a>
		</div>
		<div id='body'>";
	}

	// Affichage du pied de la page.
	function printFooter() {
		echo "
		</div>
		<div id='footer'>Copyright &#169; 2011, UMLV Inc. or its affiliates.</div>
	</body>
</html>";
	}

?>
