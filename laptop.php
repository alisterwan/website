<?php
	include './header.php';
	printHeader('Product page');

	//Connexion & requete
	$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
	$i = pg_fetch_row(pg_query($conn,"SELECT * FROM laptop WHERE id='$_GET[id]'"));

	echo "
		<div id='product'>
			<div class='title'>$i[1] $i[0]</div>
			<div class='product'>
				<div id='descriptions'>
					<div><strong>Scree size</strong>: $i[4]\"</div>
					<div><strong>System</strong>: $i[6]</div>
					<div><strong>Processor</strong>: $i[7]</div>
					<div><strong>RAM</strong>: $i[8] MB</div>
					<div><strong>HDD</strong>: $i[9] GB</div>
					<div><strong>Graphics</strong>: $i[11]</div>
					<div><strong>Battery life</strong>: $i[10]</div>
					<div><strong>Quantity</strong>: $i[5]</div>
					<div><strong>Price</strong>: $i[3] €</div>
					<div><a href='cart.php?type=laptop&add=$i[12]'><img src='./add.png' width='30'><img src='./cart.png'></a></div>
				</div>
				<div id='picture'><img src='./$i[1]/$i[2]/$i[0].png'></div>
			</div>
		</div>";

	printFooter();
?>
