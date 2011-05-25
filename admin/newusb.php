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
		<title>Add a USB Device</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php include './navigation.php' ?>

		<?php
			function productForm($model,$brand,$quantity,$capacity,$price) {
				echo "
				<p>Here you can upload a new product, please fill in the blanks to store some information in our database.</p>
				<form action='productpanel.php' method='post'>
					<table>
						<tr>
							<td>Model</td>
							<td><input type='text' name='model' value='$model'></td>
						</tr>
						<tr>
							<td>Brand</td>
							<td><input type='text' name='brand' value='$brand'></td>
						</tr>
						<tr>
							<td>Quantity/td>
							<td><input type='text' name='quantity' value='$quantity'></td>
						</tr>
						<tr>
							<td>Capacity</td>
							<td><input type='text' name='capacity' value='$capacity'></td>
						</tr>
						<tr>
							<td>Price</td>
							<td><input type='text' name='price' value='$price'></td>
						</tr>
						<tr>
							<td><input type='submit' name='proceed' value='submit'></td>
						<tr>
					</table>
				</form>";
			}

			if ($_POST) {

				$model			= $_POST[model];
				$brand			= $_POST[brand];
				$price			= $_POST[price];
			
				$quantity		= $_POST[quantity];
				$capacity		= $_POST[capacity];
				

				if (!$model || !$brand  || !$price  || !$quantity || !$capacity) {
					echo "<span class='error'>Form incomplete, please fill it completely.</span>";
					return productForm($model,$brand,$quantity,$capacity,$price);
				}

				//Connexion à la base de donnée
				$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
				if (!$conn) {
					echo "<span class='error'>Connexion error.</span>";
					return productForm($model,$brand,$quantity,$capacity,$price);
				}

				//Verification si le modele du produit est deja dans la base de donnée
				$result = pg_query($conn,"SELECT model from usb where model='$model'");
				if (pg_num_rows($result)) {
					echo "This model is already in our book. Please just check the stock.";
					return productForm($model,$brand,$quantity,$capacity,$price);
				}

				//Verification si le prix ou la quantité est au format numérique
				if (!is_numeric($price) || !is_numeric($quantity)) {
					echo "<span class='error'>Price or quantity incorrect.</span>";
					return productForm($model,$brand,$quantity,$capacity,$price);
				}

				// Ajout d'un nouveau produit dans la base de donnée
				$req = pg_query($conn,"INSERT INTO usb VALUES ('$model','$brand','$quantity','$capacity','$price')");
				if (!$req) {
					echo "<span class='error'>Query error.</span>";
					return productForm($model,$brand,$quantity,$capacity,$price);
				}
				else {
					echo "You have successfully uploaded this product.<br>";
					echo "<a href='./index.php'>Click here</a>";
				}
			}

			else {
				productForm('','','','','');
			}
		?>

	</body>
</html>
