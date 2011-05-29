<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Your cart</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
				<?php
					//Connexion a la bdd.
					$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");

					if ($type = $_GET[type] or $type = $_POST[type]) {
						if ($id = (int)$_GET[add] and is_int($id) and !$_SESSION[cart][$id])
							$_SESSION[cart][$type][$id] = 1;

						else if ($id = $_POST[inc])
							$_SESSION[cart][$type][$id]++;

						else if ($id = $_POST[dec]) {
							$_SESSION[cart][$type][$id]--;
							if (!$_SESSION[cart][$type][$id])
								unset($_SESSION[cart][$type][$id]);
						}

						else if ($id = $_POST[rm])
							unset($_SESSION[cart][$type][$id]);
					}

					$html =	"<form action='./cart.php' method='post' id='order'></form>
							<table><thead><th>Your cart</th></thead>
							<tr><td>Brand</td><td>Model</td>
							<td>Quantity</td><td>Price</td></tr>";

					if ($_SESSION[cart])
					foreach ($_SESSION[cart] as $type=>$id) {
						echo "	<form action='./cart.php' method='post' id='$type'>
									<input type='hidden' name='type' value='$type'>
								</form>";
						foreach ($id as $id_product=>$quantity) {
							$product = pg_fetch_row(pg_query($conn,"SELECT brand, model, price FROM $type WHERE id=$id_product"));
							$price = $product[2]*$quantity;
							if (!$price) {
								unset($_SESSION[cart][$type][$id_product]);
								continue;
							}
							$total += $price;
							$html = "$html
						<tr>
							<td>$product[0]</td>
							<td><a href='./$type.php?id=$id_product'>$product[1]</a></td>
							<td>$quantity
								<button type='submit' name='inc' value='$id_product' form='$type'>+</button>
								<button type='submit' name='dec' value='$id_product' form='$type'>-</button>
							</td>
							<td>$price €</td>
							<td><button type='submit' name='rm' value='$id_product' form='$type'>Remove</button></td>
						</tr>";
						}
					}

					if ($total)
						echo "$html
							<tr>
								<td colspan='3'>Total:</td>
								<td>$total €</td>
								<td><button type='submit' name='order' form='order'>Order</button></td>
							</tr></table>";
					else
						echo "<strong>Empty cart.</strong>";
				?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
