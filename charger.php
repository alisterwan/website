<?php
	session_start();
	include './header.php';
	printHeader('Product page',$_SESSION[name]);
?>
			<?php
				$id = $_GET[id];
				//Connexion & requete
				$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
				$result = pg_query($conn,"SELECT * FROM charger WHERE id='$id'");
				$i = pg_fetch_row($result);

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
