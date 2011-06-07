<?php
	include './header.php';
	printHeader('Home Page');
?>
<head>

<script type="text/javaScript">

var imgs=new Array();
imgs[0]="./javascript/pic1.jpg";
imgs[1]="./javascript/pic2.jpg";
imgs[2]="./javascript/pic3.jpg";
imgs[3]="./javascript/pic4.jpg";
imgs[4]="./javascript/pic5.jpg";
var cpt=0;

function changeimages()
{
	document.getElementById("javascript").src=imgs[cpt];
	cpt++;
	if(cpt>=imgs.length) cpt=0;
	setTimeout("changeimages()",1500);
}
</script>
</head>

<p>Welcome to our site.
Do you have difficulties to find a laptop?
Or are you searching for a gift?<br>
Here is where you will find all your answers.

<BODY onLoad="changeimages()"> 
<img id="javascript" name="picture" src="./javascript/pic1.jpg"/> 
</BODY> 





<?php
	//si personne n'est connecté
	if (!$_SESSION[name])
		echo "New customer? Register <a href='./registration.php'>here</a>.";
	echo "</p>";
	printFooter();
?>
