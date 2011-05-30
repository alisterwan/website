<div id="header">
	<a href="./index.php"><img src="laptop.png" id="logo"></a>
	<img src="MLV.png" id="mlv">
	<?php
		if ($_SESSION[name])
			echo "<span id='log'>Welcome <a>$_SESSION[name]</a>. <a href='./logout.php'>Log out</a>.</span>";
		else
			echo "<span id='log'>Welcome. <a href='./login.php'>Log in</a> or <a href='./registration.php'>register</a>.</span>";
	?>
	<a href="./cart.php" id="cart">Cart <img src="cart.png"></a>
</div>

<div id="nav">
	<a href="./index.php">Home</a>
	<a>Brands</a>
	<div>
		<a href="./brands.php?brand=Acer">Acer</a>
		<a href="./brands.php?brand=Asus">Asus</a>
		<a href="./brands.php?brand=Apple">Apple</a>
		<a href="./brands.php?brand=Dell">Dell</a>
		<a href="./brands.php?brand=HP">Hewlett&nbsp;Packard</a>
		<a href="./brands.php?brand=Toshiba">Toshiba</a>
		<a href="./brands.php?brand=Samsung">Samsung</a>
	</div>
	<a>Categories</a>
	<div>
		<a href="./type.php?type=Netbook">Netbook</a>
		<a href="./type.php?type=Notebook">Notebook</a>
		<a href="./type.php?type=Performance">Performance</a>
		<a href="./type.php?type=Multimedia">Multimedia</a>
		<a href="./type.php?type=Gamers">Gamers</a>
	</div>
	<a>Accessories</a>
	<div>
		<a href='./chargers.php'>Battery&nbsp;chargers</a>
		<a href='./usbs.php'>USB&nbsp;Flash&nbsp;Drive</a>
		<a href='./laptopcases.php'>Laptop&nbsp;case</a>
		<a href='./printers.php'>Printers</a>
	</div>
	<a href="./aboutus.php">About us</a>
</div>
