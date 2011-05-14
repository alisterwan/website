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

			<?php include './navigation.php' ?>
			<div id="content">
				<?php
					function printForm($name) {
						echo "
				<form action='login.php' method='post' name='login'>
					<table>
						<tr>
							<td>Username</td>
							<td><input type='text' name='username' value='$name'></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type='password' name='password'></td>
						</tr>
						<tr>
							<td><input type='submit' name='proceed' value='Log in'></td>
						<tr>
					</table>
				</form>";
					}

					if ($_POST) {
						$user = $_POST["username"];
						$pass = $_POST["password"];

						//Connexion à la base de donnée
						$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");

						//Verification du client dans la base de donnée
						$result = pg_query($conn,"SELECT (username,password) from customers where username='$user' and password='$pass'");
						$count = pg_num_rows($result);

						if ($count==1)
							echo "You are successfully logged in. Click <a href='./index.php'>here</a> to continue.";
						else {
							echo "<span class='error'>Username or password incorrect, try again.</span>";
							return printForm($user);
						}
					}
					else
						printForm('');
				?>
			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
