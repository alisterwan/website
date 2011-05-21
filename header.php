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
