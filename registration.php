<?php
	include './header.php';
	printHeader('Registration');

	// Formulaire affichant les champs à remplir pour l'inscription.
	function printForm($firstname,$surname,$address,$city,$country,$user,$email) {
		echo "
	<p>In order to register, please provide necessary information. You username will be used in order to log in. Your password must be at least 8 characters long.</p>
	<form action='./registration.php' method='post'>
		<div>
			<span>Firstname</span>
			<input type='text' name='firstname' value='$firstname' required>
		</div>
		<div>
			<span>Surname</span>
			<input type='text' name='surname' value='$surname' required>
		</div>
		<div>
			<span>Address</span>
			<input type='text' name='address' value='$address' required>
		</div>
		<div>
			<span>City</span>
			<input type='text' name='city' value='$city' required>
		</div>
		<div>
			<span>Country</span>
			<input type='text' name='country' value='$country' required>
		</div>
		<div>
			<span>Username</span>
			<input type='text' name='username' value='$user' required>
		</div>
		<div>
			<span>Password</span>
			<input type='password' name='password' required>
		</div>
		<div>
			<span>Confirm password</span>
			<input type='password' name='passcheck' required>
		</div>
		<div>
			<span>E-mail</span>
			<input type='text' name='email' value='$email' required>
		</div>
		<div>
			<input type='submit' name='proceed' value='submit'>
		</div>
	</form>";
}

	echo "<div class='form'>";

	if ($_POST) {

		$firstname = $_POST[firstname];
		$surname   = $_POST[surname];
		$address   = $_POST[address];
		$city      = $_POST[city];
		$country   = $_POST[country];
		$user      = $_POST[username];
		$pass      = $_POST[password];
		$email     = $_POST[email];

		// On vérifie si le mdp est est de 8 charactères minimum et l'utilisateur l'a bien saisie.
		if (strlen($pass)<8 || $pass != $_POST[passcheck]) {
			echo "<p class='error'>Password invalid or too short.</p>";
			printForm($firstname,$surname,$address,$city,$country,$user,$email);
		}

		// On vérifie si la valeur du mail saisie correspond à une adresse valide.
		else if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/',$email)) {
			echo "<p class='error'>E-mail invalid.</p>";
			printForm($firstname,$surname,$address,$city,$country,$user,'');
		}

		// Vérification si le username du client est déjà dans la base de donnée
		else if (pg_num_rows(pg_query($conn,"SELECT username from customers where username='$user'"))) {
			echo "<p class='error'>This username is already being used. Please change it.</p>";
			printForm($firstname,$surname,$address,$city,$country,'',$email);
		}

		// Vérification si le mail n'est pas déjà dans la base de donnée
		else if (pg_num_rows(pg_query($conn,"SELECT mail from customers where mail='$email'"))) {
			echo "<p class='error'>This e-mail is already registered. Please change it.</p>";
			printForm($firstname,$surname,$address,$city,$country,$user,'');
		}

		// Ajout d'un nouveau client dans la base de donnée
		else {
			$pass = sha1($pass);
			if (!pg_query($conn,"INSERT INTO customers VALUES ('$firstname','$surname','$address','$city','$country','$user','$pass','$email')")) {
				echo "<p class='error'>Query error.</p>";
				printForm($firstname,$surname,$address,$city,$country,$user,$email);
			}
			else
				echo "<p>You have been successfully registered.</p>";
		}

		//Envoie du mail de confirmation de l'inscription
/*
		$headers ='From: "laptopmlv"<laptopmlv@gmail.com>'."\n";
		$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
		$headers .='Content-Transfer-Encoding: 8bit';
		$to=$email;
		if (mail($to,"Registration to LMLV","You have been correctly registered.", $headers))
			echo "<p>An email of confirmation has been sent.</p>";
		else {
			echo "<p class='error'>The email has not been sent.</p>";
			printForm($firstname,$surname,$address,$city,$country,$user,$email);
		}
*/
	}

	else
		printForm('','','','','','','');

	echo "</div>";
	printFooter();
?>
