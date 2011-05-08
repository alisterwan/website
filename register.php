<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Registration_2</title>
<meta name="generator" content="Bluefish 2.0.1" >
<meta name="author" content="john wan kut kai" >
<meta name="date" content="2011-05-07T14:21:06+0200" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
</head>
<body>

<?php
$name=$_POST["name"];
$address=$_POST["address"];
$username=$_POST["username"];
$password=$_POST["password"];
$passcheck=$_POST["passcheck"];
$card=$_POST["numcard"];


$conn = pg_connect("host=sqletud.univ-mlv.fr dbname=jwankutk_db user=jwankutk password=Tqeouoe8");
//Connexion à la base de donnée
if (!$conn) {
  echo "Connexion error.\n";
  exit;
}

 echo "test";

// Ajout d'un nouveau client dans la base de donnée
$result=pg_query($conn,"INSERT INTO customers(name,address,card,username,password) values('$name','$address','$card','$username','$password')");
if(!$result){
echo "Error during registration.\n";
exit;
}

echo "test";

//Envoie du mail de confirmation de l'inscription
     $headers ='From: "laptopmlv"<laptopmlv@gmail.com>'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';
$to=$_POST['username'];

     if(mail($to,"Registration to LMLV","You have been correctly registered.", $headers))
     {
          echo '<br>';
          echo 'An email of confirmation has been sent.';
          echo '<br>';
          header("Location refresh=3:http://www.gmail.com");
     }
     else
     {
          echo 'The email has not been sent.';
     }
?>

</body>
</html>
