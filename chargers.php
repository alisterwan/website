<?php
	include './header.php';
	printHeader('Battery chargers');
?>

<div class='logo'>
	<img src='./typelogos/charger.png'>
</div>

<?php
	function printCharger($brand,$conn) {
		$result = pg_query($conn,"SELECT id, model FROM charger WHERE brand='$brand'");

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

	//Connexion
	$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
	printCharger('iGoGreen',$conn);
	printCharger('Targus',$conn);
	printCharger('Kensington',$conn);
	printFooter();
?>
