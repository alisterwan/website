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
					echo "<img src='./logobrands/$brand.png'>";
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
