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
			<?php include './navigation.php' ?>
			<div id="content">

					<?php
						//Connexion
						$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");

						if ($id = $_GET[add] and is_int((int)$id) and !$_SESSION[cart][$id])
							$_SESSION[cart][$id] = 1;
						else foreach ($_POST as $action=>$id)
							switch ($action) {
								case inc:
									$_SESSION[cart][$id]++;
									break;
								case dec:
									$_SESSION[cart][$id]--;
									break;
								case rm:
									unset($_SESSION[cart][$id]);
									break;
							}

						if (!count($_SESSION[cart])) {
							$_SESSION[cart][0] = 1;
							echo "<strong>Empty cart.</strong>";
						}
						else
							echo "<form action='./cart.php' method='post'>
								<table><thead><th>Your cart</th></thead>
								<tr><td>Brand</td><td>Model</td>
								<td>Quantity</td><td>Price</td></tr>";

						foreach ($_SESSION[cart] as $id=>$quantity) {
							$laptop = pg_fetch_row(pg_query($conn,"SELECT brand, model, price FROM laptop WHERE id_laptop=$id"));
							$price = $laptop[2]*$quantity;
							if (!$price) {
								unset($_SESSION[cart][$id]);
								continue;
							}
							$total += $price;
							echo "
							<tr>
								<td>$laptop[0]</td>
								<td><a href='./laptop.php?id=$id'>$laptop[1]</a></td>
								<td>$quantity
									<button type='submit' name='inc' value='$id'>+</button>
									<button type='submit' name='dec' value='$id'>-</button>
								</td>
								<td>$price €</td>
								<td><button type='submit' name='rm' value='$id'>Remove</button></td>
							</tr>";
						}

						if ($total)
							echo "<tr><td colspan='3'>Total:</td><td>$total €</td></tr></table></form>";
					?>

			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
