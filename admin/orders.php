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
		<title>View Orders</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php include './navigation.php' ?>

		<?php
			function form($conn,$id) {
				echo "<p>Here is the summary of this transaction.</p>";
				$query = pg_query($conn,"SELECT * FROM orders WHERE time=$id");
				$order = pg_fetch_row($query);
				$customer = pg_fetch_row(pg_query($conn,"SELECT * FROM customers WHERE id_customer='$order[1]'"));
				echo "<p>
					<strong>$customer[0] $customer[1]</strong> (<a href='mailto:$customer[7]'>$customer[5]</a>)<br>
					$customer[2], $customer[3]<br>$customer[4]
				</p>";

				do {
					$prod = pg_fetch_row(pg_query($conn,"SELECT brand, model FROM $order[5] WHERE id=$order[0]"));
					echo "<p>
							Model: $prod[0] $prod[1]<br>
							Quantity: $order[2]<br>
							Total: $order[3] €
						</p>";
				} while ($order = pg_fetch_row($query));

			}

			//Connexion à la base de donnée
			$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
			echo "<p>Select an order to view in the drop-down list.</p>
					<form action='./orders.php' method='post'>
						<button type='submit' name='select' value='true'>Select</button>
						<select name='choice'>";
			$query = pg_query($conn,"SELECT time FROM orders");
			while ($order = pg_fetch_row($query))
				if($order[0] != $old) {
					echo "<option value='$order[0]'>$order[0]</option>";
					$old = $order[0];
				}
			echo "</select></form>";

			if ($_POST[select]) {
				$time = $_POST[choice];
				form($conn,$time);
			}
		?>

	</body>
</html>
