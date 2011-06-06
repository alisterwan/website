<?php
	include './header.php';
	printHeader($_GET[type]);

	//Affichage par type de laptop.
	function printLaptop($type,$brand,$conn) {
		
		//on recupere le libellé,modele du laptop correspondant.
		$result = pg_query($conn,"SELECT id, model FROM laptop WHERE type='$type' and brand='$brand'");

		if (pg_num_rows($result)) {
			echo "<div class='type'><div class='title'>$brand</div>";
			while ($i = pg_fetch_row($result))
				//affiche le lien & image.
				echo "<a class='unit' href='./laptop.php?id=$i[0]'>
						<img src='./$brand/$type/$i[1].png'>
						<div>$i[1]</div>
					</a>";
			echo "</div>";
		}
	}

	$type = $_GET[type];
	echo "<div class='logo'><img src='./typelogos/$type.png'></div>";

	printLaptop($type,'Acer',$conn);
	printLaptop($type,'Apple',$conn);
	printLaptop($type,'Asus',$conn);
	printLaptop($type,'Dell',$conn);
	printLaptop($type,'HP',$conn);
	printLaptop($type,'Samsung',$conn);
	printLaptop($type,'Toshiba',$conn);

	printFooter();
?>
