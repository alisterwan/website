<?php
session_start();
include_once("cart_function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	
<head>	
<title>Your cart</title>
<meta name="description" content="Projet web">
<meta name="author" content="Alister & Mayhem">
<link rel="stylesheet" href="stylesheet.css">
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
	

$error = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action != null)
{
   if(!in_array($action,array('add', 'delete', 'refresh')))
   
   $error=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
   if (is_array($q)){
      $quantity = array();
      $i=0;
      foreach ($q as $content){
         $quantity[$i++] = intval($content);
      }
   }
   else
   $q = intval($q);
    
}

if (!$error){
   switch($action){
      Case "add":
         addLaptop($l,$q,$p);
         break;

      Case "delete":
         deleteProduct($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($quantity) ; $i++)
         {
            modifyQtyProduct($_SESSION['cart']['id_laptop'][$i],round($quantity[$i]));
         }
         break;

      Default:
         break;
   }
}	
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
