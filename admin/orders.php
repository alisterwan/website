<?php
	include './header.php';

	echo "<p>Select an order to view in the drop-down list.</p>
			<form action='./orders.php' method='post'>
				<button type='submit' name='select' value='true'>Select</button>
				<select name='choice'>";
	$query = pg_query($conn,"SELECT time, id_customers FROM orders");
	while ($o = pg_fetch_row($query)) if($o[0] != $old) {
		$c = pg_fetch_row(pg_query($conn,"SELECT firstname, surname, username FROM customers WHERE id_customer=$o[1]"));
		echo "<option value='$o[0]'>".date('d M Y H:i:s',$o[0])." $c[0] $c[1] ($c[2])</option>";
		$old = $o[0];
	}
	echo "</select></form>";

	if ($_POST[select]) {
		echo "<p>Here is the summary of this transaction.</p>";
		$time = $_POST[choice];
		$query = pg_query($conn,"SELECT * FROM orders WHERE time=$time");
		$o = pg_fetch_row($query);
		$c = pg_fetch_row(pg_query($conn,"SELECT * FROM customers WHERE id_customer='$o[1]'"));
		echo "<p>
			".date('d M Y H:i:s',$time)."<br>
			<strong>$c[0] $c[1]</strong> (<a href='mailto:$c[7]'>$c[5]</a>)<br>
			$c[2], $c[3]<br>$c[4]
		</p>";

		do {
			$p = pg_fetch_row(pg_query($conn,"SELECT brand, model FROM $o[5] WHERE id=$o[0]"));
			echo "<p>Model: $p[0] $p[1]<br>Quantity: $o[2]<br>Total: $o[3] €</p>";
		} while ($o = pg_fetch_row($query));
	}

	printFooter();
?>
