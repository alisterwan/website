<?php
session_start();
include_once("cart_function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Your cart</title>
</head>
<body>
<?php include './header.php' ?>
	<div id="body">
			<?php include './navigation.php' ?>
			<div id="content">

<form method="post" action="cart.php">
<table style="width: 400px">
	<tr>
		<td colspan="4">your cart</td>
	</tr>
	<tr>
		<td>id_laptop</td>
		<td>quantity</td>
		<td>price</td>
		<td>action</td>
	</tr>


	<?php
	if (creationcart())
	{
		$nbProduct=count($_SESSION['cart']['id_laptop']);
		if ($nbProduct <= 0)
		echo "<tr><td>Your cart is currently empty </ td></tr>";
		else
		{
			for ($i=0 ;$i < $nbProduct ; $i++)
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['cart']['id_laptop'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['cart']['quantity'][$i])."\"/></td>";
				echo "<td>".htmlspecialchars($_SESSION['cart']['price'][$i])."</td>";
				echo "<td><a href=\"".htmlspecialchars("cart.php?action=suppression&l=".rawurlencode($_SESSION['cart']['id_laptop'][$i]))."\">XX</a></td>";
				echo "</tr>";
			}

			echo "<tr><td colspan=\"2\"> </td>";
			echo "<td colspan=\"2\">";
			echo "Total : ".totalAmount();
			echo "</td></tr>";

			echo "<tr><td colspan=\"4\">";
			echo "<input type=\"submit\" value=\"Rafraichir\"/>";
			echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

			echo "</td></tr>";
		}
	}
	?>
</table>
</form>
</div>
	<?php include './footer.php' ?>
</body>
</html>
