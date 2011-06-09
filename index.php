<?php
	include './header.php';
	printHeader('Home Page');
?>

<div id="js">
	<img class="visible" src="./javascript/pic1.jpg"/>
	<img class="hidden" src="./javascript/pic2.jpg"/>
</div>
<script>
(function() {
	function rotate() {
		first = document.getElementsByClassName('visible')[0];
		second = document.getElementsByClassName('hidden')[0];
		cpt++;
		if(cpt>=imgs.length)
			cpt=0;
		second.src=imgs[cpt];
		second.className='visible';
		first.className='hidden';
	}
	var imgs=new Array();
	imgs[0]="./javascript/pic1.jpg";
	imgs[1]="./javascript/pic2.jpg";
	imgs[2]="./javascript/pic3.jpg";
	imgs[3]="./javascript/pic4.jpg";
	imgs[4]="./javascript/pic5.jpg";
	var cpt=0;
	window.setInterval(rotate, 2900);

}).call(this);
</script>

<p>Welcome to our site.
Do you have difficulties to find a laptop?
Or are you searching for a gift?<br>
Here is where you will find all your answers.

<?php
	//si personne n'est connecté
	if (!$_SESSION[name])
		echo "New customer? Register <a href='./registration.php'>here</a>.";
	echo "</p>";
?>
<div>
<li>Safe Payment:</li>
<p>Quick and safe payment methods:
at Laptop de Marne la Vallee ©, <br/>
we are pleased to offer you the best secured payment for your convenience.</p>
</div>

<div>
<li>Free shipping:</li>
<p>You don't have to move anymore!<br/>
You don't have to pay anything for the shipping!<br/>
All shipping charges are taken to Laptop de Marne la Vallee ©.</p>
</div>

<div>
<li>Customer support:</li>
<h1>01985736401000</h1>
</div>


<?php printFooter();?>
