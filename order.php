<?php
	include './header.php';
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

	printHeader('Your order');

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
				if (!$price) {
					unset($_SESSION[cart][$type][$id_product]);
					continue;
				}
				$total += $price;
				echo "	<input type='hidden' name='products[]' value='$type;$id_product;$quantity;$price'>
						<div>$quantity x $product[0] $product[1] ($price €)</div>";
			}
		}
		echo "	<input type='hidden' name='total' value='$total'>
				<div>Total: $total €</div>
				<p>Provide your credit card information:</p>
				<div>Credit card number:</div>
				<div><input type='number' name='card' required></div>
				<div>Pictogram: </div>
				<div><input type='password' name='pict' required></div>
				<div><input type='submit' value='Proceed'></div>
			</form>";
	}
	else
		echo "<p>Transaction succesful.</p>";

	printFooter();
?>
