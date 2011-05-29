<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Product page</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<?php
				$id = $_GET[id];
				//Connexion & requete
				$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
				$result = pg_query($conn,"SELECT * FROM usb WHERE id='$id'");
				$i = pg_fetch_row($result);

				echo "
		<div id='product'>
			<div class='title'>$i[1] $i[0]</div>
			<div class='product'>
				<div id='descriptions'>
					<div><strong>Capacity</strong>: $i[3] GB</div>
					<div><strong>Quantity</strong>: $i[2]</div>
					<div><strong>Price</strong>: $i[4] €</div>
					<div><strong>Description</strong>: $i[5] </div>
					<div><a href='cart.php?type=usb&add=$i[6]'><img src='./add.png' width='30'><img src='./cart.png'></a></div>
				</div>
				<div id='picture'><img src='./USB/$i[1]/$i[0].png'></div>
			</div>
		</div>";
			?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>

