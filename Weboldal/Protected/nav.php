<div class="sidebar">

	<a href="index.php">Kezdőlap</a>

	<?php if(CheckLogin() && $_SESSION['permission'] > 2) : ?>
	
	<a href="index.php?P=userlist">Felhasználók</a>
		
	<?php endif; ?>

	<a href="index.php?P=lotto">Ötöslottó</a>
	<a href="index.php?P=putto">Puttó</a>
	<a href="index.php?P=scraper">Kaparós sorsjegy</a>
	<a href="index.php?P=dice">Dobókocka</a>


</div>





<div class="toggle" onclick="toggleMenu()">
	<div class="bar1"></div>
  	<div class="bar2"></div>
  	<div class="bar3"></div>
</div>