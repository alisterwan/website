<?php
	include './header.php';
	printHeader('Your account overview');

	function printForm($customer) {
	echo "<p>Change your account information:</p>
		<form action='./account.php' method='post'>
			<div><input type='text' name='username' value='$customer[5]' required> Username</div>
			<div><input type='text' name='firstname' value='$customer[0]' required> Firstame</div>
			<div><input type='text' name='surname' value='$customer[1]' required> Surname</div>
			<div><input type='text' name='address' value='$customer[2]' required> Address</div>
			<div><input type='text' name='city' value='$customer[3]' required> City</div>
			<div><input type='text' name='country' value='$customer[4]' required> Country</div>
			<div><input type='text' name='mail' value='$customer[7]' required> E-mail</div>
			<div><input type='password' name='newpass'> New password (not required)</div>
			<div><input type='password' name='newpasscheck'> Confirm new password (not  required)</div>
			<div><input type='password' name='oldpass' required> Current password</div>
			<div><input type='submit' value='Proceed'></div>
		</form>";
	}

	//Connexion
	$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
	$customer = pg_fetch_row(pg_query($conn,"SELECT * FROM customers WHERE username='$_SESSION[name]'"));

	if ($_POST) {
		$user    = $_POST[username];
		$fname   = $_POST[firstname];
		$sname   = $_POST[surname];
		$address = $_POST[address];
		$city    = $_POST[city];
		$country = $_POST[country];
		$mail    = $_POST[mail];
		$old     = sha1($_POST[oldpass]);
		$new     = $_POST[newpass];

		if ($old != $customer[6] or ($new and ($new != $_POST[newpasscheck] or strlen($new)<8))) {
			echo "<p class='error'>Password incorrect, or too short.</p>";
			printForm($customer);
		}

		else if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/',$mail)) {
			echo "<p class='error'>E-mail invalid.</p>";
			printForm($customer);
		}

		//Verification si le username du client est deja dans la base de donnée
		else if ($user != $customer[5] and pg_num_rows(pg_query($conn,"SELECT username from customers where username='$user'"))) {
			echo "<p class='error'>This username is already being used. Chose another one.</p>";
			printForm($customer);
		}

		//Verification si le mail n'est pas deja dans la base de donnée
		else if ($mail != $customer[7] and pg_num_rows(pg_query($conn,"SELECT mail from customers where mail='$email'"))) {
			echo "<p class='error'>This e-mail is already registered. Please change it.</p>";
			printForm($customer);
		}

		// Mise à jour des données
		else {
			$pass = sha1($new);
			if($new and !pg_query($conn,"UPDATE customers SET password='$pass' WHERE id_customer=$customer[8]")) {
				echo "<p class='error'>Query error.</p>";
				printForm($customer);
			}
			else if (!pg_query($conn,"UPDATE customers SET
						firstname='$fname',
						surname='$sname',
						address='$address',
						city='$city',
						country='$country',
						username='$user',
						mail='$mail'
					WHERE id_customer=$customer[8];")) {
				echo "<p class='error'>Query error.</p>";
				printForm($customer);
			}

			else {
				echo "<p>Your account information have been changed successfully. <a href='./account.php'>Continue</a></p>";
					$_SESSION[name] = $user;
			}
		}


	}

	else
		printForm($customer);

	printFooter();
?>
