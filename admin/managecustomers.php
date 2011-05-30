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
		<title>Manage customers</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>

		<?php include './navigation.php' ?>

		<?php
			function form($conn,$id) {
				$query = pg_query($conn,"SELECT * FROM customers WHERE id_customer=$id");
				$customer = pg_fetch_row($query);
				echo "<form action='./managecustomers.php' method='post'>
					<p>Delete or update its details.</p>
					<div><input name='firstname' value='$customer[0]' required> Firstname</div>
					<div><input name='surname' value='$customer[1]' required> Surname</div>
					<div><input name='username' value='$customer[5]' required> Username</div>
					<div><input name='address' value='$customer[2]' required> Address</div>
					<div><input name='city' value='$customer[3]' required> City</div>
					<div><input name='country' value='$customer[4]' required> Country</div>
					<div><input name='mail' value='$customer[7]' required> Email</div>
					<div>
						<button type='submit' name='update' value='$id'>Update</button>
						<button type='submit' name='delete' value='$id'>Delete</button>
					</div>
					</form>";
			}

			//Connexion à la base de donnée
			$conn = pg_connect("host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
			echo "<p>Select a customer in the drop-down list.</p>";

			echo "<form action='./managecustomers.php' method='post'>
				<button type='submit' name='select' value='customer'>Select</button>
				<select name='choice'>";
			$query = pg_query($conn,"SELECT id_customer, firstname, surname, username FROM customers");
			while ($customer = pg_fetch_row($query))
				echo "<option value='$customer[0]'>$customer[1] $customer[2] ($customer[3])</option>";
			echo "</select></form>";

			if ($_POST[select]) {
				$id = $_POST[choice];
				form($conn,$id);
			}
			else if ($id = $_POST[update]) {
				$query = pg_query($conn,
					"UPDATE
						customers
					SET
						firstname = '$_POST[firstname]',
						surname   = '$_POST[surname]',
						address   = '$_POST[address]',
						city      = '$_POST[city]',
						country   = '$_POST[country]',
						username  = '$_POST[username]',
						mail      = '$_POST[mail]'
					WHERE
						id_customer=$id;"
				);
				if ($query)
					echo "<p>Successful update.</p>";
				else {
					echo "<p class='error'>Query error.</p>";
					form($conn,$id);
				}
			}
			else if ($id = $_POST[delete]) {
				pg_query($conn,"DELETE FROM customers WHERE id_customer=$id;");
			}
		?>

	</body>
</html>
