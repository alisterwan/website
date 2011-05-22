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
				<form action="./cart.php" method="post">
					<table>
						<thead><th>Your cart</th></thead>
						<tr>
							<td>Brand</td>
							<td>Model</td>
							<td>Quantity</td>
							<td>Price</td>
						</tr>

					<?php
						//Connexion & requete
						$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
						$result = pg_query($conn,"SELECT brand, model, price FROM laptop");

						if ($_GET || $_POST) {
							if($id = $_GET[add]) {
								if (!$_SESSION[cart][$id])
									$_SESSION[cart][$id] = 1;
							}
							else if ($id = $_POST[rm])
								$_SESSION[cart][$id] = 0;
							else if ($id = $_POST[inc]) {
								if ($_SESSION[cart][$id])
									$_SESSION[cart][$id]++;
							}
							else if ($id = $_POST[dec])
								if ($_SESSION[cart][$id])
									$_SESSION[cart][$id]--;
						}

						for ($i=0;$i<=pg_num_rows($result);$i++)
							if ($_SESSION[cart][$i] > 0) {
								$laptop = pg_fetch_row($result,$i-1);
								$price = $laptop[2]*$_SESSION[cart][$i];
								$total += $price;
								echo "
								<tr>
									<td>$laptop[0]</td>
									<td><a href='./laptop.php?id=$i'>$laptop[1]</a></td>
									<td>".$_SESSION[cart][$i]."
										<button type='submit' name='inc' value='$i'>+</button>
										<button type='submit' name='dec' value='$i'>-</button>
									</td>
									<td>$price €</td>
									<td><button type='submit' name='rm' value='$i'>Remove</button></td>
								</tr>";
							}
						if ($total)
							echo "
						<tr>
							<td colspan='3'>Total:</td>
							<td>$total €</td>
						</tr>";
						else
							echo "<tr><td>Empty cart.</td></tr>";
					?>

					</table>
				</form>
			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
