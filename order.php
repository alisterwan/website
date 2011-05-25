<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Registration</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="Alister & Mayhem">
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">

			<?php include './navigation.php' ?>
			<div id="content">
<?php 
echo 
	"<p>To finalize your order, please give us additional information concerning your payment.</p>
	<form action='./order.php' method='post'>
	<span>Credit card number:</span>
	
	<input type='text' name='creditcard'>
	</form>";

	if ($_POST){	
	$card=$_POST[creditcard];
	echo "$card";
			}		
		
?>
			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
