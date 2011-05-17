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
							echo "<p>HERE IS THE BRAND ACER DESCRIPTION</p>";
						if ($brand == 2)
							echo "<p>HERE IS THE BRAND ASUS DESCRIPTION</p>";
						if ($brand == 3)
							echo "<p>HERE IS THE BRAND APPLE DESCRIPTION</p>";
						if ($brand == 4)
							echo "<p>HERE IS THE BRAND DELL DESCRIPTION</p>";
						if ($brand == 5)
							echo "<p>HERE IS THE BRAND HEWLETT PACKARD DESCRIPTION</p>";
						if ($brand == 6)
							echo "<p>HERE IS THE BRAND TOSHIBA DESCRIPTION</p>";
						if ($brand == 7)
							echo "<p>HERE IS THE BRAND SAMSUNG DESCRIPTION</p>";
						echo "<br><br><br>";
					}
					function printLaptop($type) {
						//for $pc in $brand and $type
							echo "

				<div class='unit'>
					<div><img src='$pc'></div>
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
