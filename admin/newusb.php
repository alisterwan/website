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
			function productForm($model,$brand,$quantity,$capacity,$price,$description) {
				echo "
				<p>Here you can upload a new product, please fill in the blanks to store some information in our database.</p>
				<form action='newusb.php' method='post'>
					<table>
						<tr>
							<td>Model</td>
							<td><input type='text' name='model' value='$model' required></td>
						</tr>
						<tr>
							<td>Brand</td>
							<td><input type='text' name='brand' value='$brand' required></td>
						</tr>
						<tr>
							<td>Quantity</td>
							<td><input type='number' name='quantity' value='$quantity' required></td>
						</tr>
						<tr>
							<td>Capacity</td>
							<td><input type='number' name='capacity' value='$capacity' required></td>
						</tr>
						<tr>
							<td>Price</td>
							<td><input type='number' name='price' value='$price' required></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><textarea name='description' required>$description</textarea></td>
						</tr>
						<tr>
							<td>Picture</td>
							<td><input type='file' name='picture' accept='image/png' required></td>
						</tr>
						<tr>
							<td><input type='submit' name='proceed' value='submit'></td>
						<tr>
					</table>
				</form>";
			}

			if ($_POST) {

				$model       = $_POST[model];
				$brand       = $_POST[brand];
				$quantity    = $_POST[quantity];
				$capacity    = $_POST[capacity];
				$price       = $_POST[price];
				$description = $_POST[description];


				//Connexion à la base de donnée
				$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
				if (!$conn) {
					echo "<p class='error'>Connexion error.</p>";
					return productForm($model,$brand,$quantity,$capacity,$price,$description);
				}

				//Verification si le modele du produit est deja dans la base de donnée
				$result = pg_query($conn,"SELECT model from usb where model='$model'");
				if (pg_num_rows($result)) {
					echo "<p class='error'>This model is already in our book. Please check the stock.</p>";
					return productForm($model,$brand,$quantity,$capacity,$price,$description);
				}

				//Envoie d'image
				if (!move_uploaded_file($_FILES[picture][tmp_name],"../USB/$brand/$model.png")) {
					echo "<p class='error'>File upload error.</p>";
					return productForm($model,$brand,$quantity,$capacity,$price,$description);
				}

				// Ajout d'un nouveau produit dans la base de donnée
				$req = pg_query($conn,"INSERT INTO usb VALUES ('$model','$brand','$quantity','$capacity','$price','$description')");
				if (!$req) {
					echo "<p class='error'>Query error.</p>";
					return productForm($model,$brand,$quantity,$capacity,$price,$description);
				}
				else
					echo "<p>You have successfully uploaded this product.<br>
						<a href='./newusb.php'>Click here</a></p>";
			}

			else {
				productForm('','','','','','');
			}
		?>

	</body>
</html>
