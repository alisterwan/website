<?php
	include './header.php';

	function productForm($model,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife,$graphic) {
		echo "
		<p>Here you can upload a new product, please fill in the blanks to store some information in our database.</p>
		<form action='newlaptop.php' enctype='multipart/form-data' method='post'>
			<table>
				<tr>
					<td>Model</td>
					<td><input type='text' name='model' value='$model' required></td>
				</tr>
				<tr>
					<td>Brand</td>
					<td><select name='brand' required>
						<option></option>
						<option value='Acer'>Acer</option>
						<option value='Apple'>Apple</option>
						<option value='Asus'>Asus</option>
						<option value='Dell'>Dell</option>
						<option value='HP'>Hewlett Packard</option>
						<option value='Samsung'>Samsung</option>
						<option value='Toshiba'>Toshiba</option>
					</select></td>
				</tr>
				<tr>
					<td>Type</td>
					<td><select name='type' required>
						<option></option>
						<option value='Netbook'>Netbook</option>
						<option value='Notebook'>Notebook</option>
						<option value='Performance'>Performance</option>
						<option value='Multimedia'>Multimedia</option>
						<option value='Gamers'>Gamers</option>
					</select></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type='number' name='price' value='$price' required></td>
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
					<td>System</td>
					<td><input type='text' name='system' value='$system' required></td>
				</tr>
				<tr>
					<td>Processor</td>
					<td><input type='text' name='processor' value='$processor' required></td>
				</tr>
				<tr>
					<td>RAM</td>
					<td><input type='number' name='ram' value='$ram' required></td>
				</tr>
				<tr>
					<td>HDD</td>
					<td><input type='number' name='hdd' value='$hdd' required></td>
				</tr>
				<tr>
					<td>Battery life</td>
					<td><input type='number' name='batterylife' value='$batterylife' required></td>
				</tr>
				<tr>
					<td>Graphic card</td>
					<td><input type='text' name='graphic' value='$graphic' required></td>
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
		$type        = $_POST[type];
		$price       = $_POST[price];
		$size        = $_POST[size];
		$quantity    = $_POST[quantity];
		$system      = $_POST[system];
		$processor   = $_POST[processor];
		$ram         = $_POST[ram];
		$hdd         = $_POST[hdd];
		$batterylife = $_POST[batterylife];
		$graphic     = $_POST[graphic];

		// Vérification si le modèle existe déjà dans la base de donnée
		$result = pg_query($conn,"SELECT model from laptop where model='$model'");
		if (pg_num_rows($result)) {
			echo "<p class='error'>This model is already in our book. Please check the stock.</p>";
			return productForm($model,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife,$graphic);
		}

		// Envoie d'image
		if (!move_uploaded_file($_FILES[picture][tmp_name],"../$brand/$type/$model.png")) {
			echo "<p class='error'>File upload error.</p>";
			return productForm($model,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife,$graphic);
		}

		// Ajout d'un nouveau produit dans la base de donnée
		$req = pg_query($conn,"INSERT INTO laptop VALUES ('$model','$brand','$type','$price','$size','$quantity','$system','$processor','$ram','$hdd','$batterylife','$graphic')");

		if (!$req) {
			echo "<p class='error'>Query error.</p>";
			return productForm($model,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife,$graphic);
		}

		else
			echo "<p>You have successfully uploaded this product.<br>
				<a href='./newlaptop.php'>Click here</a></p>";
	}

	else
		productForm('','','','','','','','','','');

	printFooter();
?>
