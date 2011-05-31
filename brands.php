<?php
	session_start();
	include './header.php';
	printHeader($_GET[brand],$_SESSION[name]);
?>
			<?php
				function printLaptop($brand,$type) {
					//Connexion & requete
					$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
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

				$brand = $_GET[brand];
				echo "<div class='logo'><img src='./logobrands/$brand.png'></div>";

				printLaptop($brand,Netbook);
				printLaptop($brand,Notebook);
				printLaptop($brand,Performance);
				printLaptop($brand,Multimedia);
				printLaptop($brand,Gamers);

	printFooter();
?>
