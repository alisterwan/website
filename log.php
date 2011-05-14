<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Login</title>
		<meta name="description" content="Projet web">
		<meta name="author" content="john" >
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
<?php
$user= $_POST["username"];
$pass= $_POST["password"];

	//Connexion à la base de donnée
		$conn = "host=sqletud.univ-mlv.fr port=5432 dbname=jwankutk_db user=jwankutk password=Tqeouoe8";
		$connect=pg_connect($conn);
		
//Verification du client dans la base de donnée
$result = pg_query($connect,"SELECT (username,password) from customers where username='$user' and password='$pass'"); 
$count=pg_num_rows($result);

if($count!=1){echo "Please retry to log in.Click <a href=./login.php>here</a>";}
if($count==1){echo "You have successfully logged in. Click <a href='./index.php'>here</a> to continue.";}

?>
	</body>
</html>
