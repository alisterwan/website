<?php
session_start();
include_once("cart_function.php");
if (!$_SESSION){include './login.php';}

	session_start();
	include_once("cart_function.php");

?>
<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Your cart</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="john" >
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<?php include './header.php' ?>

		<div id="body">
			<?php include './navigation.php' ?>
			<div id="content">
				<p>Your cart</p>

				<form method="post" action="cart.php">
					<table>
						<tr>
							<td>Model</td>
							<td>Quantity</td>
							<td>Price</td>
						</tr>

						<?php
							$action = (isset($_POST[action])? $_POST[action]: (isset($_GET[action])? $_GET[action]:null));
							if($action) {
								//récuperation des variables en POST ou GET
								$l = (isset($_POST[l])? $_POST[l]: (isset($_GET[l])? $_GET[l]:null));
								$p = (isset($_POST[p])? $_POST[p]: (isset($_GET[p])? $_GET[p]:null));
								$q = (isset($_POST[q])? $_POST[q]: (isset($_GET[q])? $_GET[q]:null));

								//Suppression des espaces verticaux
								$l = preg_replace('#\v#','',$l);
								//On verifie que $p soit un float
								$p = floatval($p);

								//On traite $q qui peut etre un entier simple ou un tableau d'entier
								if (is_array($q)) {
									$quantity = array();
									$i=0;
									foreach ($q as $content) {
										$quantity[$i++] = intval($content);
									}
								}
								else
									$q = intval($q);
							}

							switch($action) {
								Case "add":
									addLaptop($l,$q,$p);
									break;
								Case "delete":
									deleteProduct($l);
									break;
								Case "refresh":
									for ($i=0;$i<count($quantity);$i++)
										modifyQtyProduct($_SESSION[cart][model][$i],round($quantity[$i]));
										break;
								Default:
									break;
							}

							if ($nbProduct = count($_SESSION[cart][model])) {
								for ($i=0;$i<$nbProduct;$i++) {
									echo "
									<tr>
										<td>
											".htmlspecialchars($_SESSION[cart][model][$i])."
										</td>
										<td>
											<input type='text' size='3' name='q[]' value='".htmlspecialchars($_SESSION[cart][quantity][$i])."'>
										</td>
										<td>
											".htmlspecialchars($_SESSION[cart][price][$i])."
										</td>
										<td>
											<a href='".htmlspecialchars("cart.php?action=delete&l=".rawurlencode($_SESSION[cart][model][$i]))."'>delete</a>
										</td>
									</tr>";
								}

								$total = totalAmount();
								echo "
									<tr><td colspan='4'>
										Total: $total
									</td></tr>
									<tr><td colspan='4'>
										<input type='submit' value='Refresh'>
										<input type='submit' value='Order'>
										<input type='hidden' name='action' value='refresh'>
									</td></tr>";
							}
							else
								echo "<tr><td>Your cart is currently empty</td></tr>";
						?>

					</table>
				</form>
			</div>
		</div>

		<?php include './footer.php' ?>
	</body>
</html>
