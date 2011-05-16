<?php
	session_start();
	session_destroy(); // On détruit la session
	header("location: index.php"); // On renvoie ensuite sur la page d'accueil
?>
