<?php
	function printForm() {
		echo "
<form id='login' action='index.php' method='post' name='login'>
	Administration password:&nbsp;
	<input type='password' name='password'>
	<input type='submit' name='proceed' value='Log in'>
</form>";
	}

	if ($_POST["password"] == laptopmlv) {
		echo "<a href='./index.php'>Continue</a>.";
		$_SESSION[masterpass] = "laptopmlv";
	}
	else {
		printForm();
		if ($_POST)
			echo "<span class='error'>Password incorrect, try again.</span>";
	}
?>
