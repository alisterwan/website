<?php
	session_start();
	session_unregister(name);
	session_unregister(masterpass);
	header("location: index.php"); // On renvoie ensuite sur la page d'accueil
?>
