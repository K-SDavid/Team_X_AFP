<?php
require_once USER_MANAGER;
if (CheckLogin()):
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addlotto'])) {
		header("Location: index.php?P=addlotto");
	}
?>
<form method="POST">
	<input type="submit" name="addlotto" value="Ötöslottó vásárlása">
</form>
<?php endif;?>
<p>A játék lényege 5 szám kiválasztása 0 és 90 között, majd sorsoláskor 5 számot kihúznak, és a megegyező számok függvényében nyerhető jutalom.</p>
<h1>Játékleírás:</h1>