<?php
	include './header.php';
	printHeader('Battery chargers');
?>

<div class='logo'>
	<img src='./typelogos/charger.png'>
</div>

<?php
	//fonction qui charge en donnée les chargeurs.
	function printCharger($brand,$conn) {
		//lien qui recupere l'id chargeur et le modele grace à la méthode GET et la 		                  redirige vers une autre page pour y charger les données.
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
