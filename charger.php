<?php
	include './header.php';
	printHeader('Product page');

	//requête qui charge en page les données de la bdd correspondant à l'identifiant 	    du produit recupéré grace à la méthode post.
	$i = pg_fetch_row(pg_query($conn,"SELECT * FROM charger WHERE id='$_GET[id]'"));

	echo "
		<div id='product'>
			<div class='title'>$i[1] $i[0]</div>
			<div class='product'>
				<div id='descriptions'>
					<div><strong>Quantity</strong>: $i[2]</div>
					<div><strong>Price</strong>: $i[3] €</div>
					<div><strong>Description</strong>: $i[4] </div>
					<div><a href='cart.php?type=charger&add=$i[5]'><img src='./add.png' width='30'><img src='./cart.png'></a></div>
				</div>
				<div id='picture'><img src='./Chargers/$i[1]/$i[0].png'></div>
			</div>
		</div>";

	printFooter();
?>
