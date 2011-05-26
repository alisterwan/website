<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php echo "<title>$_GET[type]</title>"; ?>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<?php
				function printUsb() {
					//Connexion & requete
					$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
					$result = pg_query($conn,"SELECT id_usb, model,brand FROM usb");

					if (pg_num_rows($result)) {
						echo "<div class='type'><div class='title'>USB Storage Devices</div>";
						while ($i = pg_fetch_row($result))
							echo "	<a class='unit' href='./usbform.php?id=$i[0]'>
										<img src='./USB/$i[2]/$i[1].png'>
										<div>$i[1]</div>
									</a>";
						echo "</div>";
					}
				}

				$type = $_GET[type];
				echo "<div class='logo'><img src='./typelogos/usb.png'></div>";

				function printUsb();
				function printUsb();
				function printUsb();
				
			?>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
