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
		<meta name="author" content="Alister & Mayhem" >
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
<<<<<<< HEAD
		<?php   
			if ($_SESSION[masterpass] == laptopmlv)
				
				echo "";
				echo "Welcome webmaster.";
				echo "<br/>";
				echo "Choose a category to upload.";
				echo "<br/>";
				echo "<a href='./productpanel.php'><u>Laptop</u></a>";
				echo "<br/>";
				echo "<a href><u>Accessories </u></a>";
				echo"<br />";
=======

		Please choose a category to upload your product.
		<br>
		<a href='./productpanel.php'>Laptop</a>
		<br>
		<a href>Accessories</a>
>>>>>>> 4b6aa4e4b5c9bdacd059f96531101b7333218c4e

		?>
<?php 
echo "<a href='./login.php'>Log out</a>";
?>
		
	</body>
</html>
