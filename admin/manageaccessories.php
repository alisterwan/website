<?php
	session_start();
	if($_SESSION[masterpass] != '415ab40ae9b7cc4e66d6769cb2c08106e8293b48')
		header("location: ../login.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Manage products</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php include './navigation.php' ?>

	<a href='./newusb.php'>Add a USB device.</a> <br/>	
	<a href='./newcharger.php'>Add a universal laptop charger.</a><br/> 	
	<a href='./newprinter.php'>Add a new printer.</a> <br/>	

	</body>
</html>

