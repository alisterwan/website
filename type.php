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
			<?php include './navigation.php' ?>
			<div id="content">

				<?php
					function printLaptop($type,$brand) {
						//Connexion & requete
						$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
						$result = pg_query($conn,"SELECT id_laptop, model FROM laptop WHERE type='$type' and brand='$brand'");

						while ($i = pg_fetch_row($result))
							echo "
				<a href='./laptop.php?id=$i[0]'><div class='unit'>
					<div><img src='./$brand/$type/$i[1].png'></div>
					<div>$i[1]</div>
				</div></a>";
					}

					$type = $_GET[type];
					switch ($type) {
						case Netbook:
							echo "<img src='./typelogos/$type.png'>";
							break;
						case Notebook:
							echo "<img src='./typelogos/$type.png'>";
							break;
						case Performance:
							echo "<img src='./typelogos/$type.png'>";
							break;
						case Multimedia:
							echo "<img src='./typelogos/$type.png'>";
							break;
						case Gamers:
							echo "<img src='./typelogos/$type.png'>";
							break;
					}
					echo "<br><br><br>";
				?>

				<div class="type">
					<div class="title">Acer</div>
					<?php
						printLaptop($type,Acer);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Asus</div>
					<?php
						printLaptop($type,Asus);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Apple</div>
					<?php
						printLaptop($type,Apple);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Dell</div>
					<?php
						printLaptop($type,Dell);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Hewlett Pacard</div>
					<?php
						printLaptop($type,HP);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Toshiba</div>
					<?php
						printLaptop($type,Toshiba);
					?>
					<br clear="left">
				</div>
				<div class="type">
					<div class="title">Samsung</div>
					<?php
						printLaptop($type,Samsung);
					?>
					<br clear="left">
				</div>

			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
