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
			function form($conn,$type,$id) {
				$query = pg_query($conn,"SELECT brand, model, price, quantity FROM $type WHERE id=$id");
				$product = pg_fetch_row($query);
				echo "<form action='./manageproducts.php' method='post'>
					<p>Delete or update its price/quantity.</p>
					<div><strong>$product[0] $product[1]</strong></div>
					<div><input type='hidden' name='productid' value='$id' required></div>
					<div><input name='price' value='$product[2]' required> Price</div>
					<div><input name='quantity' value='$product[3]' required> Quantity</div>
					<div>
						<button type='submit' name='update' value='$type'>Update</button>
						<button type='submit' name='delete' value='$type'>Delete</button>
					</div>
					</form>";
			}

			//Connexion à la base de donnée
			$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
			echo "<p>Select a product in one of the drop-down list.</p>";

			echo "<form action='./manageproducts.php' method='post'>
				<button type='submit' name='select' value='laptop'>Select</button>
				<select name='choice'>";
			$query = pg_query($conn,"SELECT id, brand, model FROM laptop");
			while ($product = pg_fetch_row($query))
				echo "<option value='$product[0]'>$product[1] $product[2]</option>";
			echo "</select></form>";

			echo "<form action='./manageproducts.php' method='post'>
				<button type='submit' name='select' value='charger'>Select</button>
				<select name='choice'>";
			$query = pg_query($conn,"SELECT id, brand, model FROM charger");
			while ($product = pg_fetch_row($query))
				echo "<option value='$product[0]'>$product[1] $product[2]</option>";
			echo "</select></form>";

			echo "<form action='./manageproducts.php' method='post'>
				<button type='submit' name='select' value='laptopcase'>Select</button>
				<select name='choice'>";
			$query = pg_query($conn,"SELECT id, brand, model FROM laptopcase");
			while ($product = pg_fetch_row($query))
				echo "<option value='$product[0]'>$product[1] $product[2]</option>";
			echo "</select></form>";

			echo "<form action='./manageproducts.php' method='post'>
				<button type='submit' name='select' value='usb'>Select</button>
				<select name='choice'>";
			$query = pg_query($conn,"SELECT id, brand, model FROM usb");
			while ($product = pg_fetch_row($query))
				echo "<option value='$product[0]'>$product[1] $product[2]</option>";
			echo "</select></form>";

			echo "<form action='./manageproducts.php' method='post'>
				<button type='submit' name='select' value='printer'>Select</button>
				<select name='choice'>";
			$query = pg_query($conn,"SELECT id, brand, model FROM printer");
			while ($product = pg_fetch_row($query))
				echo "<option value='$product[0]'>$product[1] $product[2]</option>";
			echo "</select></form>";

			if ($type = $_POST[select]) {
				$id = $_POST[choice];
				form($conn,$type,$id);
			}
			else if ($type = $_POST[update]) {
				$id       = $_POST[productid];
				$price    = (int)$_POST[price];
				$quantity = (int)$_POST[quantity];
				$query    = pg_query($conn,"UPDATE $type SET price=$price, quantity=$quantity WHERE id=$id;");
				if ($query)
					echo "<p>Successful update.</p>";
				else {
					echo "<p class='error'>Query error.</p>";
					form($conn,$type,$id);
				}
			}
			else if ($type = $_POST[delete]) {
				$id = $_POST[productid];
				pg_query($conn,"DELETE FROM $type WHERE id=$id;");
			}
		?>

	</body>
</html>
