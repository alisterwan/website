<?php
	include './header.php';
	printHeader('USB Flash Drive');
?>

<div class='logo'>
	<img src='./typelogos/usb.png'>
</div>

<?php

	// Fonction qui affiche les produits par marques.
	function printUsb($brand,$conn) {
		$result = pg_query($conn,"SELECT id, model FROM usb WHERE brand='$brand'");

		if (pg_num_rows($result)) {
			echo "<div class='type'><div class='title'>$brand</div>";
			while ($i = pg_fetch_row($result))
				echo "<a class='unit' href='./usb.php?id=$i[0]'>
						<img src='./USB/$brand/$i[1].png'>
						<div>$i[1]</div>
					</a>";
			echo "</div>";
		}
	}

	printUsb('Corsair',$conn);
	printUsb('Kingston',$conn);
	printUsb('Sandisk',$conn);
	printFooter();
?>
