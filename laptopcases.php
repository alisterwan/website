<?php
	include './header.php';
	printHeader('Laptop case');
?>

<div class='logo'>
	<img src='./typelogos/case.png'>
</div>

<?php
	// Fonction qui affiche les produits par marques.
	function printCase($brand,$conn) {
		$result = pg_query($conn,"SELECT id, model FROM laptopcase WHERE brand='$brand'");

		if (pg_num_rows($result)) {
			echo "<div class='type'><div class='title'>$brand</div>";
			while ($i = pg_fetch_row($result))
				echo "	<a class='unit' href='./laptopcase.php?id=$i[0]'>
							<img src='./Case/$brand/$i[1].png'>
							<div>$i[1]</div>
						</a>";
			echo "</div>";
		}
	}

	printCase('Belkin',$conn);
	printCase('HP',$conn);
	printCase('Incase',$conn);
	printCase('Targus',$conn);
	printFooter();
?>
