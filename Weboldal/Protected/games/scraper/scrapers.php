<?php
require_once USER_MANAGER;

if(!CheckLogin()):
	echo "<div><h1>Egyszerű kaparós sorsjegy: </h1><h3>Ár: 2€ <br> Nyeremény: 10€</h3> <br>  <br> <h1>Blackjack: </h1><h3>Ár: 5€ <br> Nyeremény: 10€ <br> Nyeremény 21 esetén: 20€</h3></div>";
else: ?>

<form method="POST" action="index.php?P=blackjackscraper">
	<input type="submit" name="blackjackscrapersubmit" value="Blackjack">
</form>

<form method="POST" action="index.php?P=simplescraper">
	<input type="submit" name="simplescratchsubmit" value="Egyszerű kaparós">
</form>
<?php endif; ?>