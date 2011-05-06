<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Registration</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<?php include './navigation.php' ?>
			<div id="content">
				<p>In order to register, please provide necessary information. Your password must be at least 8 characters long.</p>
				<form action="register.php" method="post" name="registration">
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="address"></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="username"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td>Confirm your password</td>
							<td><input type="password" name="passcheck"></td>
						</tr>
						<tr>
							<td><input type="submit" name="proceed" value="submit"></td>
						<tr>
					</table>
				</form>
			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
