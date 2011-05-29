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

		<form action="./manageproducts.php" method="post">

			<?php
				function update($conn,$id) {
					$query = pg_query($conn,"SELECT brand, model, price, quantity FROM laptop WHERE id=$id");
					$laptop = pg_fetch_row($query);
					echo "<p>Update its price or its quantity.</p>";
					echo "<div><strong>$laptop[0] $laptop[1]</strong></div>";
					echo "<div><input type='hidden' name='updateid' value='$id'></div>";
					echo "<div><input name='price' value='$laptop[2]'> Price</div>";
					echo "<div><input name='quantity' value='$laptop[3]'> Quantity</div>";
					echo "<div><button type='submit' name='update' value='true'>Update</button></div>";
				}

				//Connexion à la base de donnée
				$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
				$query = pg_query($conn,"SELECT id, brand, model FROM laptop");
				echo "<p>Select a product in the drop-down list.</p><div><select name='choice'>";
				while ($laptop = pg_fetch_row($query))
					echo "<option value='$laptop[0]'>$laptop[1] $laptop[2]</option>";
				echo "</select> <button type='submit' name='select' value='true'>Select</button></div>";

				if ($_POST[select]) {
					$id = $_POST[choice];
					update($conn,$id);
				}
				else if ($_POST[update]) {
					$id = $_POST[updateid];
					$price = (int)$_POST[price];
					$quantity = (int)$_POST[quantity];
					$query = pg_query($conn,"UPDATE laptop SET price=$price, quantity=$quantity WHERE id=$id;");
					if ($query)
						echo "<p>Successful update.</p>";
					else {
						echo "<p class='error'>Error.</p>";
						$id = $_POST[updateid];
						update($conn,$id);
					}
				}
			?>

		</form>

	</body>
</html>
