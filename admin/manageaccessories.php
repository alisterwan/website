<?php
	session_start();
	if($_SESSION[masterpass] != 'ba45712c1efa4d68f5907f7bf74abb091567c6c3')
		header("location: ../login.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Manage accessories</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php include './navigation.php' ?>

		<p>Select a product to upload</p>

		<a href='./newusb.php'>Add a USB device</a><br/>
		<a href='./newcharger.php'>Add a universal laptop charger</a><br/>
		<a href='./newprinter.php'>Add a new printer</a><br/>
		<a href='./newcase.php'>Add a new laptop case</a>

	</body>
</html>

