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
				<p>Pour vous inscrire dans ce club, nous avons besoin de quelques renseignements. Preparez un nom d'usage pour le club et un mot de passe de plus de 8 caracteres dont vous vous souviendrez facilement.</p>
				<form action="inscription.php" method="post" name="registration">
					<table>
						<tr>
							<td>Votre nom:</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td>Votre adresse:</td>
							<td><input type="text" name="address"></td>
						</tr>
						<tr>
							<td>Nom d'utilisateur:</td>
							<td><input type="text" name="username"></td>
						</tr>
						<tr>
							<td>Mot de passe:</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td>Numero de carte bancaire:</td>
							<td><input type="text" name="num_card"></td>
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
