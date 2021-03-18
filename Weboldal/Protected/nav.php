<div class="sidebar">

	<a href="index.php">Kezdőlap</a>

	<?php if(CheckLogin()) : ?>
		<a href="index.php?P=logout">Kijelentkezés</a>
	<?php endif; ?>

</div>





<div class="toggle" onclick="toggleMenu()">
	<div class="bar1"></div>
  	<div class="bar2"></div>
  	<div class="bar3"></div>
</div>