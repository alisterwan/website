<?php 

//creation d'un panier
function creationcart(){
   if (!isset($_SESSION['cart'])){
      $_SESSION['cart']=array();
      $_SESSION['cart']['model'] = array();
      $_SESSION['cart']['quantity'] = array();
      $_SESSION['cart']['price'] = array();
      $_SESSION['cart']['lock'] = false;
   }
   return true;
}

//verifie si le panier est verouille.
function isLock(){
   if (isset($_SESSION['cart']) && $_SESSION['cart']['lock'])
   return true;
   else
   return false;
}

//fonction qui compte le nombre d'articles au panier.
function countProduct()
{
   if (isset($_SESSION['cart']))
   return count($_SESSION['cart']['model']);
   else
   return 0;

}

//fonction qui supprime le panier
function deletecart(){
   unset($_SESSION['cart']);
}

//fonction qui ajoute un laptop au panier
function addLaptop($model,$quantity,$price){

   //Si le cart existe
   if (creationcart() && !isLock())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $searchProduct = array_search($model, $_SESSION['cart']['model']);

      if ($searchProduct !== false)
      {
         $_SESSION['cart']['quantity'][$searchProduct] += $quantity ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['cart']['model'],$model);
         array_push( $_SESSION['cart']['quantity'],$quantity);
         array_push( $_SESSION['cart']['price'],$price);
      }
   }
   else
   echo "We have just encounted a problem. Please contact our webmaster for more information.";
}


//fonction qui supprime un produit
function deleteProduct($model){
   //Si le cart existe
   if (creationcart() && !isLock())
   {
      //Creation d'un panier temporaire
      $tmp=array();
      $tmp['model'] = array();
      $tmp['quantity'] = array();
      $tmp['price'] = array();
      $tmp['lock'] = $_SESSION['cart']['lock'];

      for($i = 0; $i < count($_SESSION['cart']['model']); $i++)
      {
         if ($_SESSION['cart']['model'][$i] !== $model)
         {
            array_push( $tmp['model'],$_SESSION['cart']['model'][$i]);
            array_push( $tmp['quantity'],$_SESSION['cart']['quantity'][$i]);
            array_push( $tmp['price'],$_SESSION['cart']['price'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['cart'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "We have just encounted a problem. Please contact our webmaster for more information.";
}

//fonction qui modifie la quantite des produits.
function modifyQtyProduct($model,$quantity){
   //Si le panier éxiste
   if (creationcart() && !isLock())
   {
      //Si la quantité est positive on modifie sinon on supprime le produit
      if ($quantity > 0)
      {
         //Recherche du produit dans le panier
         $searchProduct = array_search($model,  $_SESSION['cart']['model']);

         if ($searchProduct !== false)
         {
            $_SESSION['cart']['quantity'][$searchProduct] = $quantity ;
         }
      }
      else
      deleteProduct($model);
   }
   else
   echo "We have just encounted a problem. Please contact our webmaster for more information.";
}

//fonction qui affiche le montant global des articles achetés.
function totalAmount(){
   $total=0;
   for($i = 0; $i < count($_SESSION['cart']['model']); $i++)
   {
      $total += $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['price'][$i];
   }
   return $total;
}

?>
