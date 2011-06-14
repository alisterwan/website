<?php
	include './header.php';

	echo "<p>Select an order to view in the drop-down list.</p>
			<form action='./orders.php' method='post'>
				<button type='submit' name='select' value='true'>Select</button>
				<select name='choice'>";
	$query = pg_query($conn,"SELECT time, id_customers FROM orders");
	// On affiche la liste des commandes passées.
	while ($o = pg_fetch_row($query)) if($o[0] != $old) {
		$c = pg_fetch_row(pg_query($conn,"SELECT firstname, surname, username FROM customers WHERE id_customer=$o[1]"));
		echo "<option value='$o[0]'>".date('d M Y H:i:s',$o[0])." $c[0] $c[1] ($c[2])</option>";
		$old = $o[0];
	}
	echo "</select></form>";

	// On affiche les informations sur la commande sélectionnée
	if ($_POST[select]) {
		echo "<p>Here is the summary of this transaction.</p>";
		$time = $_POST[choice];

		$query = pg_query($conn,"SELECT * FROM orders, customers WHERE orders.time=$time AND orders.id_customers=customers.id_customer");
		$q = pg_fetch_row($query);
		echo "<p>
			".date('d M Y H:i:s',$time)."<br>
			<strong>$q[7] $q[8]</strong> (<a href='mailto:$q[14]'>$q[12]</a>)<br>
			$q[9], $q[10]<br>$q[11]
		</p>";

		do {
			$p = pg_fetch_row(pg_query($conn,"SELECT brand, model FROM $q[5] WHERE id=$q[0]"));
			echo "<p>Model: $p[0] $p[1]<br>Quantity: $q[2]<br>Total: $q[3] €</p>";
		} while ($q = pg_fetch_row($query));
	}

	printFooter();
?>
