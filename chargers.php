<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Battery chargers</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<div class='logo'>
				<img src='./typelogos/charger.png'>
			</div>
			<?php
				function printCharger($brand) {
					//Connexion & requete
					$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
					$result = pg_query($conn,"SELECT id, model FROM charger WHERE brand='$brand'");

					if (pg_num_rows($result)) {
						echo "<div class='type'><div class='title'>$brand</div>";
						while ($i = pg_fetch_row($result))
							echo "	<a class='unit' href='./charger.php?id=$i[0]'>
										<img src='./Chargers/$brand/$i[1].png'>
										<div>$i[1]</div>
									</a>";
						echo "</div>";
					}
				}

				printCharger(iGoGreen);
				printCharger(Targus);
				printCharger(Kensington);
			?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>