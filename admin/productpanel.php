<?php
	session_start();
	if($_SESSION[masterpass] != laptopmlv)
		header("location: login.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Registration</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php
			function productForm($model,$brand,$type,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife) {
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
							<td>Type</td>
							<td><input type='text' name='type' value='$type'></td>
						</tr>
						<tr>
							<td>Price</td>
							<td><input type='text' name='price' value='$price'></td>
						</tr>
						<tr>
							<td>Size</td>
							<td><input type='text' name='size' value='$size'></td>
						</tr>
						<tr>
							<td>Quantity</td>
							<td><input type='text' name='quantity' value='$quantity'></td>
						</tr>
						<tr>
							<td>System</td>
							<td><input type='text' name='system' value='$system'></td>
						</tr>
						<tr>
							<td>Processor</td>
							<td><input type='text' name='processor' value='$processor'></td>
						</tr>
						<tr>
							<td>RAM</td>
							<td><input type='text' name='ram' value='$ram'></td>
						</tr>
						<tr>
							<td>HDD</td>
							<td><input type='text' name='hdd' value='$hdd'></td>
						</tr>
						<tr>
							<td>Battery life</td>
							<td><input type='text' name='batterylife' value='$batterylife'></td>
						</tr>
						<tr>
							<td><input type='submit' name='proceed' value='submit'></td>
						<tr>
					</table>
				</form>";
			}

			if ($_POST) {

				$model			= $_POST["model"];
				$brand			= $_POST["brand"];
				$type			= $_POST["type"];
				$price			= $_POST["price"];
				$size			= $_POST["size"];
				$quantity		= $_POST["quantity"];
				$system			= $_POST["system"];
				$processor		= $_POST["processor"];
				$ram			= $_POST["ram"];
				$hdd			= $_POST["hdd"];
				$batterylife	= $_POST["batterylife"];

				if (!$model || !$brand || !$type || !$price || !$size || !$quantity || !$system || !$processor || !$ram || !$hdd || !$batterylife) {
					echo "<span class='error'>Form incomplete, please fill it completely.</span>";
					return productForm($model,$brand,$type,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife);
				}

				//Connexion à la base de donnée
				$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
				if (!$conn) {
					echo "<span class='error'>Connexion error.</span>";
					return productForm($model,$brand,$type,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife);
				}

				//Verification si le modele du produit est deja dans la base de donnée
				$result = pg_query($conn,"SELECT model from laptop where model='$model'");
				if (pg_num_rows($result) == 1) {
					echo "This model is already in our book. Please just check the stock.";
					return productForm('',$brand,$type,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife);
				}

				// Ajout d'un nouveau produit dans la base de donnée
				$req = pg_query($conn,"INSERT INTO laptop VALUES ('$model','$brand','$type','$price','$size','$quantity','$system', '$processor','$ram','$hdd','$batterylife')");
				if (!$req) {
					echo "<span class='error'>Query error.</span>";
					return productForm($model,$brand,$type,$price,$size,$quantity,$system,$processor,$ram,$hdd,$batterylife);
				}
				else {
					echo "You have successfully uploaded this product.<br>";
					echo "<a href='./index.php'>Click here</a>";
				}
			}

			else {
				productForm('','','','','','','','','','','');
			}
		?>

	</body>
</html>
