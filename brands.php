<?php
	include './header.php';
	$brand = $_GET[brand];
	printHeader($brand);

	function printLaptop($brand,$type,$conn) {
		$result = pg_query($conn,"SELECT id, model FROM laptop WHERE brand='$brand' and type='$type'");

		if (pg_num_rows($result)) {
			echo "<div class='type'><div class='title'>$type</div>";
			while ($i = pg_fetch_row($result))
				echo "	<a class='unit' href='./laptop.php?id=$i[0]'>
							<img src='./$brand/$type/$i[1].png'>
							<div>$i[1]</div>
						</a>";
			echo "</div>";
		}
	}

	echo "<div class='logo'><img src='./logobrands/$brand.png'></div>";

	printLaptop($brand,'Netbook',$conn);
	printLaptop($brand,'Notebook',$conn);
	printLaptop($brand,'Performance',$conn);
	printLaptop($brand,'Multimedia',$conn);
	printLaptop($brand,'Gamers',$conn);
	printFooter();
?>
