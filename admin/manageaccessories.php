<?php
	session_start();
	if($_SESSION[masterpass] != '415ab40ae9b7cc4e66d6769cb2c08106e8293b48')
		header("location: ../login.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Manage products</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php include './navigation.php' ?>



<?php
	 
	echo "<p>Select a product in the drop-down list.</p><div><select name='choice'>
	<form action='./manageaccessories' method='post'>
	<option>Add a USB device.</option>
	<option>Add a universal laptop charger.</option>
	<option>Add a new printer. </option>
	</select> <button type='submit' name='select' value='true'>Select</button></div>
	</form>";

?>
	</body>
</html>

