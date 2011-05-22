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
				<form action='registration.php' method='post' name='registration'>
					<div>
						<span>Firstname</span>
						<input type='text' name='firstname' value='$firstname'>
					</div>
					<div>
						<span>Surname</span>
						<input type='text' name='surname' value='$surname'>
					</div>
					<div>
						<span>Address</span>
						<input type='text' name='address' value='$address'>
					</div>
					<div>
						<span>City</span>
						<input type='text' name='city' value='$city'>
					</div>
					<div>
						<span>Country</span>
						<input type='text' name='country' value='$country'>
					</div>
					<div>
						<span>Username</span>
						<input type='text' name='username' value='$user'>
					</div>
					<div>
						<span>Password</span>
						<input type='password' name='password'>
					</div>
					<div>
						<span>Confirm password</span>
						<input type='password' name='passcheck'>
					</div>
					<div>
						<span>E-mail</span>
						<input type='text' name='email' value='$email'>
					</div>
					<div>
						<input type='submit' name='proceed' value='submit'>
					</div>
				</form>";
					}

					if ($_POST) {

						$firstname= $_POST[firstname];
						$surname  = $_POST[surname];
						$address  = $_POST[address];
						$city     = $_POST[city];
						$country  = $_POST[country];
						$user     = $_POST[username];
						$pass     = $_POST[password];
						$email    = $_POST[email];

						if (!$firstname || !$surname || !$address || !$city || !$country || !$user || !$pass || !$email) {
							echo "<span class='error'>Form incomplete, please fill it completely.</span>";
							return printForm($firstname,$surname,$address,$city,$country,$user,$email);
						}

						if (strlen($pass)<8 || $pass != $_POST[passcheck]) {
							echo "<span class='error'>Password invalid or too short.</span>";
							return printForm($firstname,$surname,$address,$city,$country,$user,$email);
						}

						//Connexion à la base de donnée
						$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
						if (!$conn) {
							echo "<span class='error'>Connexion error.</span>";
							return printForm($firstname,$surname,$address,$city,$country,$user,$email);
						}

						//Verification si le username du client est deja dans la base de donnée
						$result = pg_query($conn,"SELECT username from customers where username='$user'");
						if (pg_num_rows($result)) {
							echo "<span class='error'>This username is already used. Please change it.</span>";
							return printForm($firstname,$surname,$address,$city,$country,'',$email);
						}

						//Verification si le mail n'est pas deja dans la base de donnée
						$res = pg_query($conn,"SELECT mail from customers where mail='$email'");
						if (pg_num_rows($res)) {
							echo "<span class='error'>This e-mail is already registered. Please change it.</span>";
							return printForm($firstname,$surname,$address,$city,$country,$user,'');
						}

						// Ajout d'un nouveau client dans la base de donnée
						$req = pg_query($conn,"INSERT INTO customers VALUES ('$firstname','$surname','$address','$city','$country','$user','$pass','$email')");
						if (!$req) {
							echo "<span class='error'>Query error.</span>";
							return printForm($firstname,$surname,$address,$city,$country,$user,$email);
						}
						else
							echo "You have been successfully registered.";

						//Envoie du mail de confirmation de l'inscription
/*
						$headers ='From: "laptopmlv"<laptopmlv@gmail.com>'."\n";
						$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
						$headers .='Content-Transfer-Encoding: 8bit';
						$to=$email;
						if (mail($to,"Registration to LMLV","You have been correctly registered.", $headers)) {
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
