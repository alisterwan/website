<?php
	session_start();

	//Session Administrateur
	if ($_POST[username] == admin && $_POST[password] == laptopmlv) {
		$_SESSION[name] = Admininistrator;
		$_SESSION[masterpass] = '415ab40ae9b7cc4e66d6769cb2c08106e8293b48';
		header("location: ./admin/index.php");
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Login</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<?php
				function printForm($name) {
					echo "
			<form action='login.php' method='post' name='login'>
				<div>
					<span>Username</span>
					<input type='text' name='username' value='$name'>
				</div>
				<div>
					<span>Password</span>
					<input type='password' name='password'>
				</div>
				<div>
					<input type='submit' name='proceed' value='Log in'>
				</div>
			</form>";
				}


				if ($_POST) {
					$user = $_POST[username];
					$pass = sha1($_POST[password]);

					//Connexion à la base de donnée
					$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");

					//Verification du client dans la base de donnée
					$result = pg_query($conn,"SELECT (username,password) from customers where username='$user' and password='$pass'");
					$count = pg_num_rows($result);
					if ($count) {
						echo "You are successfully logged in. Click <a href='./index.php'>here</a> to continue.";
						return $_SESSION[name] = $user;
					}

					echo "<span class='error'>Username or password incorrect, try again.</span>";
					printForm($user);
				}
				else
					printForm('');
			?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
