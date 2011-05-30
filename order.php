<?php
	session_start();
	if (!$_SESSION[name] or !$_SESSION[cart])
		header("location: ./cart.php");

	//Connexion a la bdd.
	$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");

	if ($_POST) {
		$card     = crypt($_POST[card],$_POST[pict]);
		$products = $_POST[products];
		$customer = pg_fetch_row(pg_query($conn,"SELECT id_customer FROM customers WHERE username='$_SESSION[name]'"));
		foreach ($products as $details) {
			preg_match('/^([a-z]+);([0-9]+);([0-9]+);([0-9]+)$/',$details,$matches);
			pg_query($conn,"INSERT INTO orders VALUES ('$matches[2]','$customer[0]','$matches[3]','$matches[4]','$card','$matches[1]')");
			pg_query($conn,"UPDATE $matches[1] SET quantity=quantity-$matches[3] WHERE id=$matches[2]");
		}
		unset($_SESSION[cart]);
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Your order</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<?php
				if ($_SESSION[cart]) {
				echo "	<p>Here is the summary of your order:</p>
						<form action='./order.php' method='post'>";
				foreach ($_SESSION[cart] as $type=>$id) {
					foreach ($id as $id_product=>$quantity) {
						$product = pg_fetch_row(pg_query($conn,"SELECT brand, model, price, quantity FROM $type WHERE id=$id_product"));
						if($quantity > $product[3]) {
							$_SESSION[cart][$type][$id_product] = $quantity = $product[3];
						}
						$price = $product[2]*$quantity;
						$total += $price;
						echo "<input type='hidden' name='products[]' value='$type;$id_product;$quantity;$price'>";
						echo "<div>$quantity x $product[0] $product[1] ($price €)</div>";
					}
				}
				echo "	<input type='hidden' name='total' value='$total'>
						<div>Total: $total €</div>
						<p>Provide your credit card information:</p>
						<div>Credit card number:</div>
						<div><input type='text' name='card'></div>
						<div>Pictogram: </div>
						<div><input type='text' name='pict'></div>
						<div><input type='submit' value='Proceed'></div>
					</form>";
				}
				else
					echo "<p>Transaction succesful.</p>";
			?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
