<?php
	session_start();
	if($_SESSION[masterpass] != laptopmlv)
		header("location: login.php");
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

		Please choose a category to upload your product.
		<br>
		<a href='./productpanel.php'>Laptop</a>
		<br>
		<a href>Accessories</a>

	</body>
</html>
