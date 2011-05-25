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
				$result = pg_query($conn,"SELECT * FROM laptop WHERE id_laptop='$id'");
				$i = pg_fetch_row($result);

				echo "
		<div id='product'>
			<div class='title'>$i[1] $i[0]</div>
			<div>
				<div id='picture'><img src='./$i[1]/$i[2]/$i[0].png'></div>
				<div id='descriptions'>
					<div><strong>Scree size</strong>: $i[4]\"</div>
					<div><strong>System</strong>: $i[6]</div>
					<div><strong>Processor</strong>: $i[7]</div>
					<div><strong>RAM</strong>: $i[8] MB</div>
					<div><strong>HDD</strong>: $i[9] GB</div>
					<div><strong>Graphics</strong>: $i[11]</div>
					<div><strong>Battery life</strong>: $i[10]</div>
					<div><strong>Quantity</strong>: $i[5]</div>
					<div><strong>Price</strong>: $i[3] €</div>
					<div><a href='cart.php?add=$i[12]'><img src='./add.png' width='30'><img src='./cart.png'></a></div>
				</div>
				<br clear='both'>
			</div>
		</div>";
			?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
