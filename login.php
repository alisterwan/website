<?php
	include './header.php';

	//Session Administrateur
	if ($_POST[username] == admin && sha1($_POST[password]) == 'ba45712c1efa4d68f5907f7bf74abb091567c6c3') {
		$_SESSION[name] = Admininistrator;
		$_SESSION[masterpass] = 'ba45712c1efa4d68f5907f7bf74abb091567c6c3';
		header("location: ./admin/index.php");
	}

	printHeader('Login');

	function printForm($name) {
		echo "
<form action='login.php' method='post' name='login'>
	<div>
		<span>Username</span>
		<input type='text' name='username' value='$name' required>
	</div>
	<div>
		<span>Password</span>
		<input type='password' name='password' required>
	</div>
	<div>
		<input type='submit' name='proceed' value='Log in'>
	</div>
</form>";
	}

	echo "<div class='form'>";

	if ($_POST) {
		$user = $_POST[username];
		$pass = sha1($_POST[password]);

		//Verification du client dans la base de donnée
		if (pg_num_rows(pg_query($conn,"SELECT * FROM customers WHERE username='$user' and password='$pass'"))) {
			echo "<p>You are successfully logged in. Click <a href='./index.php'>here</a> to continue.</p>";
			$_SESSION[name] = $user;
		}

		else {
			echo "<p class='error'>Username or password incorrect, try again.</p>";
			printForm($user);
		}
	}
	else
		printForm('');
	echo "</div>";

	printFooter();
?>
