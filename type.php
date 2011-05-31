<?php
	session_start();
	include './header.php';
	printHeader($_GET[type],$_SESSION[name]);

	function printLaptop($type,$brand,$conn) {
		$result = pg_query($conn,"SELECT id, model FROM laptop WHERE type='$type' and brand='$brand'");

		if (pg_num_rows($result)) {
			echo "<div class='type'><div class='title'>$brand</div>";
			while ($i = pg_fetch_row($result))
				echo "<a class='unit' href='./laptop.php?id=$i[0]'>
						<img src='./$brand/$type/$i[1].png'>
						<div>$i[1]</div>
					</a>";
			echo "</div>";
		}
	}

	$type = $_GET[type];
	echo "<div class='logo'><img src='./typelogos/$type.png'></div>";

	//Connexion
	$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
	printLaptop($type,'Acer',$conn);
	printLaptop($type,'Asus',$conn);
	printLaptop($type,'Apple',$conn);
	printLaptop($type,'Dell',$conn);
	printLaptop($type,'HP',$conn);
	printLaptop($type,'Toshiba',$conn);
	printLaptop($type,'Samsung',$conn);

	printFooter();
?>
