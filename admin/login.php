<?php
	session_start();
	if ($_POST["password"] == laptopmlv) {
		$_SESSION[masterpass] = laptopmlv;
		$_SESSION[name] = Admin;
		header("location: index.php");
	}
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

		<form id='login' action='login.php' method='post' name='login'>
			Administration password:&nbsp;
			<input type='password' name='password'>
			<input type='submit' name='proceed' value='Log in'>
		</form>
		<?php
			if ($_POST)
				echo "<span class='error'>Password incorrect, try again.</span>";
		?>

	</body>
</html>
