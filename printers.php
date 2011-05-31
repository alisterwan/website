<?php
	session_start();
	include './header.php';
	printHeader('Printers',$_SESSION[name]);
?>

<div class='logo'>
	<img src='./typelogos/printer.png'>
</div>

<?php
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

	//Connexion
	$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
	printPrinter('HP',$conn);
	printPrinter('Epson',$conn);
	printPrinter('Samsung',$conn);
	printPrinter('Canon',$conn);
	printFooter();
?>
