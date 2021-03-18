
<?php
	require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=sad");
	else:
?>
	<form method="POST">
		<div class="addcard">
			<input type="text" name="name" placeholder="Név">
			<input type="text" name="number" placeholder="Kártyaszám">
			<input type="text" name="expiration" placeholder="Lejárati dátum">
			<input type="text" name="security" placeholder="Biztonsági kód">
			<button type="submit" name="submitCard">Kártya hozzáadása</button>
		</div>
	</form>
<?php endif; ?>