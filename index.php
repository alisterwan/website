<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Home page</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<?php include './navigation.php' ?>
			<div id="content">Welcome to our site. Do you have difficulties to find a laptop? Or are you searching 
			for a gift?<br/>
			Here you will find all your answers. New customer? Register<a href='./registration.php'> here</a>.</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
