<?php
	session_start();
	if($_SESSION[masterpass] != '415ab40ae9b7cc4e66d6769cb2c08106e8293b48')
		header("location: ../login.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>View Orders</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php include './navigation.php' ?>

		<?php
			function form($conn,$id) {
			$query = pg_query($conn,"SELECT * FROM orders WHERE time=$id");
				$order = pg_fetch_row($query);
				$quantity=$order[2]; 
				$total=$order[3];
				$table=$order[5]; 
				
			$res  = pg_query($conn,"SELECT username FROM customers WHERE 
			id_customer = '$order[1]'");	
			while ($customer = pg_fetch_row($res)){
			$name=$customer[0];
			}
			
			$res1 = pg_query($conn,"SELECT model FROM $table WHERE 
			id = '$order[0]'");	
			while ($prod = pg_fetch_row($res1)){
			$model=$prod[0];
				
				}
			
					
			echo "Here is the summary of this transaction. <br/> <br/>";
			echo "model:$model <br/>";
			echo "customer:$name <br/>";
			echo "customer id:$order[1] <br/>";
			echo "quantity:$quantity <br/>";
			echo "Total:$total €";
			
			}
			
			//Connexion à la base de donnée
			$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
			echo "<p>Select an order to view in the drop-down list.</p>";

			echo "<form action='./orders.php' method='post'>
				<button type='submit' name='select' value='customer'>Select</button>
				<select name='choice'>";
			$query = pg_query($conn,"SELECT time FROM orders");
			while ($order = pg_fetch_row($query)) {
				if($order[0] != $old) {
					echo "<option value='$order[0]'>$order[0]</option>";
					$old = $order[0];
				}
			}
			echo "</select></form>";

			if ($_POST[select]) {
				$id = $_POST[choice];
				form($conn,$id);
			}
		?>

	</body>
</html>
