<?php
	include './header.php';
	printHeader('Battery chargers');
?>

<div class='logo'>
	<img src='./typelogos/charger.png'>
</div>

<?php
	// Fonction qui affiche les produits par marques.
	function printCharger($brand,$conn) {
		$result = pg_query($conn,"SELECT id, model FROM charger WHERE brand='$brand'");

		//affichage par marque
		if (pg_num_rows($result)) {
			echo "<div class='type'><div class='title'>$brand</div>";
			while ($i = pg_fetch_row($result))
				echo "	<a class='unit' href='./charger.php?id=$i[0]'>
							<img src='./Chargers/$brand/$i[1].png'>
							<div>$i[1]</div>
						</a>";
			echo "</div>";
		}
	}

	printCharger('iGoGreen',$conn);
	printCharger('Kensington',$conn);
	printCharger('Targus',$conn);
	printFooter();
?>
