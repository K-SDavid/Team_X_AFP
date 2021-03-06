<?php
require_once USER_MANAGER;
require_once 'lottomanager.php';
if (CheckLogin()):
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addlotto'])) {
		header("Location: index.php?P=addlotto");
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['listlotto'])) {
		header("Location: index.php?P=listlotto");
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['roll'])) {
		header("Location: index.php?P=lottoroll");
	}
?>
<?php if ($_SESSION['permission'] > 2): ?>
<?php $lw = LottoRoll(); ?>
<form method="POST" action="index.php?P=lottoroll">
		<input type="submit" name="roll" value="Számok kihúzása">
		<input type="hidden" name="numbers1" value="<?=$lw[0]?>">
		<input type="hidden" name="numbers2" value="<?=$lw[1]?>">
		<input type="hidden" name="numbers3" value="<?=$lw[2]?>">
		<input type="hidden" name="numbers4" value="<?=$lw[3]?>">
		<input type="hidden" name="numbers5" value="<?=$lw[4]?>">
</form>
<?php endif ?>
<form method="POST">
	<?php if($_SESSION['balance'] > 5): ?>
		<input type="submit" name="addlotto" value="Ötöslottó vásárlása">
		<br>
	<?php endif; ?>
	<input type="submit" name="listlotto" value="Számok megtekintése">
</form>
<?php endif;?>
<ul style="margin-bottom: 20px;">
	<li>5 találat: 10000000€</li>
	<li>4 találat: 5000€</li>
	<li>3 találat: 300€</li>
	<li>2 találat: 25€</li>
	<li>1 találat: 0€</li>
</ul>
<h3>Nyeremény:</h3>
<hr style="width: 85%; margin: 20px 0 30px 0;">
<p style="margin-top: 5px;"><b>Ár: 5€</b></p>
<p>A játék lényege 5 szám kiválasztása 0 és 90 között, majd sorsoláskor 5 számot kihúznak, és a megegyező számok függvényében nyerhető jutalom.</p>
<h1>Játékleírás:</h1>