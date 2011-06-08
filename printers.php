<?php
	include './header.php';
	printHeader('Printers');
?>

<div class='logo'>
	<img src='./typelogos/printer.png'>
</div>

<?php
	// Fonction qui affiche les produits par marques.
	function printPrinter($brand,$conn) {
		$result = pg_query($conn,"SELECT id, model FROM printer WHERE brand='$brand'");

		if (pg_num_rows($result)) {
			echo "<div class='type'><div class='title'>$brand</div>";
			while ($i = pg_fetch_row($result))
				echo "<a class='unit' href='./printer.php?id=$i[0]'>
						<img src='./Printers/$brand/$i[1].png'>
						<div>$i[1]</div>
					</a>";
			echo "</div>";
		}
	}

	printPrinter('Canon',$conn);
	printPrinter('Epson',$conn);
	printPrinter('HP',$conn);
	printPrinter('Samsung',$conn);
	printFooter();
?>
