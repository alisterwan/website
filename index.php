<?php
	session_start();
	include './header.php';
	printHeader('Home Page',$_SESSION[name]);
?>

Welcome to our site.
Do you have difficulties to find a laptop?
Or are you searching for a gift?<br>
Here is where you will find all your answers.

<?php
	if (!$_SESSION[name])
		echo "New customer? Register <a href='./registration.php'>here</a>.";
	printFooter();
?>
