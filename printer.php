<?php
	include './header.php';
	printHeader('Product page');

	// On affiche les données de la bdd correspondant à l'identifiant du produit recupéré grâce à la méthode get.
	$i = pg_fetch_row(pg_query($conn,"SELECT * FROM printer WHERE id='$_GET[id]'"));

	echo "
<div id='product'>
	<div class='title'>$i[1] $i[0]</div>
	<div class='product'>
		<div id='descriptions'>
			<div><strong>Type</strong>: $i[2]</div>
			<div><strong>Quantity</strong>: $i[3]</div>
			<div><strong>Price</strong>: $i[4] €</div>
			<div><strong>Description</strong>: $i[5] </div>
			<div><a href='cart.php?type=printer&add=$i[6]'><img src='./add.png' width='30'><img src='./cart.png'></a></div>
		</div>
		<div id='picture'><img src='./Printers/$i[1]/$i[0].png'></div>
	</div>
</div>";

	printFooter();
?>
