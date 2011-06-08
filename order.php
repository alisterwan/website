<?php
	include './header.php';
	// Rediriger l'utilisateur s'il n'est pas connecté ou la variable de session du panier n'existe pas
	if (!$_SESSION[name] or !$_SESSION[cart])
		header("location: ./cart.php");

	if ($_POST) {
		// On récupère le numéro de carte bancaire du client et on l'encrypte avec le pictogramme
		$card     = crypt($_POST[card],$_POST[pict]);
		$products = $_POST[products];
		$customer = pg_fetch_row(pg_query($conn,"SELECT id_customer FROM customers WHERE username='$_SESSION[name]'"));
		$time = time();
		foreach ($products as $details) {
			// On récupère la quantité et le prix total de chaque produits
			preg_match('/^([a-z]+);([0-9]+);([0-9]+);([0-9]+)$/',$details,$matches);
			if(!pg_query($conn,"INSERT INTO orders VALUES ('$matches[2]','$customer[0]','$matches[3]','$matches[4]','$card','$matches[1]','$time')")) {
				echo "Error transaction query";
				return;
			}
			// Décrementer la quantité du produit correpondant
			pg_query($conn,"UPDATE $matches[1] SET quantity=quantity-$matches[3] WHERE id=$matches[2]");
		}
		unset($_SESSION[cart]);
	}

	printHeader('Your order');

	if ($_SESSION[cart]) {
		echo "	<p>Here is the summary of your order:</p>
				<form action='./order.php' method='post'>";
		// On récupère et affiche les détails des produits dans la bdd
		foreach ($_SESSION[cart] as $type=>$id) {
			foreach ($id as $id_product=>$quantity) {
				$product = pg_fetch_row(pg_query($conn,"SELECT brand, model, price, quantity FROM $type WHERE id=$id_product"));
				// On décroit la quantité si elle est supérieur à celle disponible
				if($quantity > $product[3]) {
					$_SESSION[cart][$type][$id_product] = $quantity = $product[3];
				}
				$price = $product[2]*$quantity;
				// On supprime si la quantité est égale à 0 ou le produit n'existe pas
				if (!$price) {
					unset($_SESSION[cart][$type][$id_product]);
					continue;
				}
				// On incrémente le le prix total
				$total += $price;

				echo "	<input type='hidden' name='products[]' value='$type;$id_product;$quantity;$price'>
						<div>$quantity x $product[0] $product[1] ($price €)</div>";
			}
		}

		// Affiche le prix total et affiche un formulaire demandant de rentrer les infos
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
