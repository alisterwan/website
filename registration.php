<!doctype html>
<html lang="en">
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
				<?php
					function printForm($firstname,$surname,$address,$city,$country,$user,$email) {
						echo "
				<p>In order to register, please provide necessary information. You username will be used in order to log in. Your password must be at least 8 characters long.</p>
				<form action='registration.php' method='post'>
					<table>
						<tr>
							<td>Firstname</td>
							<td><input type='text' name='firstname' value='$firstname'></td>
						</tr>
						<tr>
							<td>Surname</td>
							<td><input type='text' name='surname' value='$surname'></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type='text' name='address' value='$address'></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type='text' name='city' value='$city'></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><input type='text' name='country' value='$country'></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type='text' name='username' value='$user'></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type='password' name='password'></td>
						</tr>
						<tr>
							<td>Confirm your password</td>
							<td><input type='password' name='passcheck'></td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td><input type='text' name='email' value='$email'></td>
						</tr>
						<tr>
							<td><input type='submit' name='proceed' value='submit'></td>
						<tr>
					</table>
				</form>";
					}

					if ($_POST) {

						$firstname= $_POST["firstname"];
						$surname  = $_POST["surname"];
						$address  = $_POST["address"];
						$city     = $_POST["city"];
						$country  = $_POST["country"];
						$user     = $_POST["username"];
						$pass     = $_POST["password"];
						$email    = $_POST["email"];

						if (!$firstname || !$surname || !$address || !$city || !$country || !$user || !$pass || !$email) {
							echo "<span class='error'>Form incomplete, please fill it completely.</span>";
							printForm($firstname,$surname,$address,$city,$country,$user,$email);
							exit;
						}

						if ($pass && strlen($pass)<8 || $pass != $_POST["passcheck"]) {
							echo "<span class='error'>Password invalid or too short.</span>";
							printForm($firstname,$surname,$address,$city,$country,$user,$email);
							exit;
						}

						//Connexion à la base de donnée
						$conn = new PDO("pgsql:host=sqletud.univ-mlv.fr;dbname=jwankutk_db","jwankutk","Tqeouoe8");
						if (!$conn) {
							echo "<span class='error'>Connexion error.</span>";
							printForm($firstname,$surname,$address,$city,$country,$user,$email);
							exit;
						}

						// Ajout d'un nouveau client dans la base de donnée
						$result = $conn -> query("INSERT INTO customers VALUES ('$firstname','$surname','$address','$city','$country','$user','$pass','$email')");
						if(!$result) {
							echo "<span class='error'>Query error.</span>";
							printForm($firstname,$surname,$address,$city,$country,$user,$email);
							exit;
						}
						else
							echo "You have been successfully registered.";

						//Envoie du mail de confirmation de l'inscription
/*
						$headers ='From: "laptopmlv"<laptopmlv@gmail.com>'."\n";
						$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
						$headers .='Content-Transfer-Encoding: 8bit';
						$to=$email;
						if(mail($to,"Registration to LMLV","You have been correctly registered.", $headers)) {
							echo "An email of confirmation has been sent.";
						}
						else {
							echo '<span class='error'>The email has not been sent.</span>'
							printForm($firstname,$surname,$address,$city,$country,$user,$email);
						}
*/
					}
					else
						printForm('','','','','','','');
				?>
			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
