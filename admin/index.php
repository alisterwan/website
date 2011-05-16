<?php session_start(); ?>
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

		?>
<?php 
echo "<a href='./login.php'>Log out</a>";
?>
		
	</body>
</html>
