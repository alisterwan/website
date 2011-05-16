<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Home page</title>
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
					function printDescription($brand) {
						if ($brand == 1)
							echo "<p>HERE BE BRAND ACER DESCRIPTION</p>";
						else if ($brand == 2)
							echo "<p>HERE BE BRAND ASUS DESCRIPTION</p>";
						else if ($brand == 3)
							echo "<p>HERE BE BRAND APPLE DESCRIPTION</p>";
						else if ($brand == 4)
							echo "<p>HERE BE BRAND DELL DESCRIPTION</p>";
						else if ($brand == 5)
							echo "<p>HERE BE BRAND HEWLETT PACKARD DESCRIPTION</p>";
						else if ($brand == 6)
							echo "<p>HERE BE BRAND TOSHIBA DESCRIPTION</p>";
						else if ($brand == 7)
							echo "<p>HERE BE BRAND SAMSUNG DESCRIPTION</p>";
						echo "<br><br><br>";
					}
					function printLaptop($type) {
						if ($brand == 1)
							$branddir = 'Acer';
						else if ($brand == 2)
							$branddir = 'Asus';
						else if ($brand == 3)
							$branddir = 'Apple';
						else if ($brand == 4)
							$branddir = 'Apple';
						else if ($brand == 5)
							$branddir = 'Dell';
						else if ($brand == 6)
							$branddir = 'Hewlett Packard';
						else if ($brand == 7)
							$branddir = 'Samsung';
						//for $pc in $brand and $type
							echo "

				<div class='unit'>
					<div><img src='./$branddir/$name.png'></div>
					<div>$name name</div>
				</div>

							";
					}
					$brand = $_GET[brand];
					printDescription($brand);
				?>

				<div class="type">
					<div class="title">Netbook</div>
					<?php
						printLaptop(1);
					?>
				</div>
				<div class="type">
					<div class="title">Notebook</div>
					<?php
						printLaptop(2);
					?>
				</div>
				<div class="type">
					<div class="title">Performance</div>
					<?php
						printLaptop(3);
					?>
				</div>
				<div class="type">
					<div class="title">Multimedia</div>
					<?php
						printLaptop(4);
					?>
				</div>
				<div class="type">
					<div class="title">Gamers</div>
					<?php
						printLaptop(5);
					?>
				</div>

			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
