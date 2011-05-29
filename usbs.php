<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>USB Flash Drive</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<div class='logo'>
				<img src='./typelogos/usb.png'>
			</div>
			<?php
				function printUsb($brand) {
					//Connexion & requete
					$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
					$result = pg_query($conn,"SELECT id, model FROM usb WHERE brand='$brand'");

					if (pg_num_rows($result)) {
						echo "<div class='type'><div class='title'>$brand</div>";
						while ($i = pg_fetch_row($result))
							echo "	<a class='unit' href='./usb.php?id=$i[0]'>
										<img src='./USB/$brand/$i[1].png'>
										<div>$i[1]</div>
									</a>";
						echo "</div>";
					}
				}

				printUsb(Sandisk);
				printUsb(Corsair);
				printUsb(Kingston);
			?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
