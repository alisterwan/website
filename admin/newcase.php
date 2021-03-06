<?php
	include './header.php';

	function productForm($model,$size,$quantity,$price,$description) {
		echo "
		<p>Here you can upload a new product, please fill in the blanks to store some information in our database.</p>
		<form action='newcase.php' method='post'>
			<table>
				<tr>
					<td>Model</td>
					<td><input type='text' name='model' value='$model' required></td>
				</tr>
				<tr>
					<td>Brand</td>
					<td><select name='brand' required>
						<option></option>
						<option value='Belkin'>Belkin</option>
						<option value='HP'>HP</option>
						<option value='Incase'>Incase</option>
						<option value='Targus'>Targus</option>
					</select></td>
				</tr>
				<tr>
					<td>Size</td>
					<td><input type='number' name='size' value='$size' required></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type='number' name='quantity' value='$quantity' required></td>
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
		$size        = $_POST[size];
		$quantity    = $_POST[quantity];
		$price       = $_POST[price];
		$description = $_POST[description];

		// Vérification si le modèle existe déjà dans la base de donnée
		$result = pg_query($conn,"SELECT model from laptopcase where model='$model'");
		if (pg_num_rows($result)) {
			echo "<p class='error'>This model is already in our book. Please check the stock.</p>";
			return productForm($model,$size,$quantity,$price,$description);
		}

		// Envoie d'image
		if (!move_uploaded_file($_FILES[picture][tmp_name],"../Case/$brand/$model.png")) {
			echo "<p class='error'>File upload error.</p>";
			return productForm($model,$size,$quantity,$price,$description);
		}

		// Ajout d'un nouveau produit dans la base de donnée
		$req = pg_query($conn,"INSERT INTO laptopcase VALUES ('$model','$brand','$size','$quantity','$price','$description')");
		if (!$req) {
			echo "<p class='error'>Query error.</p>";
			return productForm($model,$size,$quantity,$price,$description);
		}
		else
			echo "<p>You have successfully uploaded this product.<br>
				<a href='./newcase.php'>Click here</a></p>";
	}

	else
		productForm('','','','','');

	printFooter();
?>
