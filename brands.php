<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php echo "<title>$_GET[brand]</title>"; ?>
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
					function printLaptop($brand,$type) {
						//Connexion & requete
						$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
						$result = pg_query($conn,"SELECT id_laptop, model FROM laptop WHERE brand='$brand' and type='$type'");

						while ($i = pg_fetch_row($result))
							echo "
				<a href='./laptop.php?id=$i[0]'><div class='unit'>
					<div><img src='./$brand/$type/$i[1].png'></div>
					<div>$i[1]</div>
				</div></a>";
					}

					$brand = $_GET[brand];
					switch ($brand) {
						case Acer:
							echo "<p>HERE IS THE BRAND ACER DESCRIPTION</p>";
							break;
						case Asus:
							echo "<p>HERE IS THE BRAND ASUS DESCRIPTION</p>";
							break;
						case Apple:
							echo "<p>HERE IS THE BRAND APPLE DESCRIPTION</p>";
							break;
						case Dell:
							echo "<p>HERE IS THE BRAND DELL DESCRIPTION</p>";
							break;
						case HP:
							echo "<p>HERE IS THE BRAND HEWLETT PACKARD DESCRIPTION</p>";
							break;
						case Toshiba:
							echo "<p>HERE IS THE BRAND TOSHIBA DESCRIPTION</p>";
							break;
						case Samsung:
							echo "<p>HERE IS THE BRAND SAMSUNG DESCRIPTION</p>";
							break;
					}
					echo "<br><br><br>";
				?>

				<div class="type">
					<div class="title">Netbook</div>
					<?php
						printLaptop($brand,Netbook);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Notebook</div>
					<?php
						printLaptop($brand,Notebook);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Performance</div>
					<?php
						printLaptop($brand,Performance);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Multimedia</div>
					<?php
						printLaptop($brand,Multimedia);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Gamers</div>
					<?php
						printLaptop($brand,Gamers);
					?>
					<br clear="left">
				</div>

			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
