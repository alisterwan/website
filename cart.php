<?php
	session_start();
	include './header.php';
	printHeader('Your cart',$_SESSION[name]);
?>
			<?php
				//Connexion a la bdd.
				$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");

				if ($type = $_GET[type] or $type = $_POST[type]) {
					if ($id = (int)$_GET[add] and is_int($id) and !$_SESSION[cart][$type][$id])
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

				$html =	"<table class='cart'><thead><tr><th>Your cart</th></tr>
						<tr><th>Brand</th><th>Model</th>
						<th>Quantity</th><th>Price</th></tr></thead><tbody>";

				if ($_SESSION[cart])
				foreach ($_SESSION[cart] as $type=>$id) {
					if (!$_SESSION[cart][$type]) {
						unset($_SESSION[cart][$type]);
						continue;
					}
					$forms = "$forms<form action='./cart.php' method='post' id='$type'>
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

				if ($total) {
					echo "$forms$html<tr><td colspan='3'>Total:</td><td>$total €</td><td>";
					if ($_SESSION[name])
						echo "<a href='./order.php'><input type='button' value='Order'></a>";
					else
						echo "<a href='./login.php'>Log in to order.</a>";
					echo "</td></tr></tbody></table>";
				}
				else
					echo "<strong>Empty cart.</strong>";

	printFooter();
?>
