<?php
	require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=denied");
	else:
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitCard'])) {
		$postData = [
			'cardname' => $_POST['cardname'],
			'cardnumber' => $_POST['cardnumber'],
			'expirationM' => $_POST['expirationM'],
			'expirationY' => $_POST['expirationY'],
			'security' => $_POST['security']
		];
		if(empty($postData['cardname']) || empty($postData['cardnumber']) || empty($postData['expirationY']) || empty($postData['security'])) {
			echo "Hiányzó adat(ok)!";
		} else if(strlen($postData['cardname']) < 6) {
			echo "A név túl rövid!";
		} else if(1 === preg_match('~[0-9]~', $postData['cardname'])) {
			echo "A név nem tartalmazhat számot!";
		} else if(strlen($postData['cardnumber']) != 16) {
			echo "A kártyaszámnak 16 karakterből kell állnia!";
		} else if(!is_numeric(($postData['cardnumber']))) {
			echo "A kártyaszám csak szám lehet!";
		} else if(strlen($postData['expirationY']) != 2) {
			echo "A lejárati év nem megfelelő!";
		} else if(!is_numeric(($postData['expirationY']))) {
			echo "A lejárati év csak szám lehet!";
		} else if($postData['expirationY'] > date("y") + 5 || $postData['expirationY'] < date("y")) {
			echo "A lejárati év nem megfelelő!";
		} else if(strlen($postData['security']) != 3) {
			echo "A biztonsági kód csak három karakter lehet!";
		} else if(!is_numeric(($postData['security']))) {
			echo "A biztonsági kód csak szám lehet!";
		} else {
			require_once CARD_MANAGER;
			if(!AddCard($_SESSION['uid'], $postData['cardname'], $postData['cardnumber'], $postData['expirationM'].$postData['expirationY'], $postData['security'])) {
				echo "A bankkártya hozzáadása nem sikerült!";
			}
		}

	}
?>
<form method="POST">
	<div class="addcard">
		<input type="text" name="cardname" placeholder="Név" value="<?=isset($postData) ? $postData['cardname'] : "";?>">
		<input type="text" name="cardnumber" placeholder="Kártyaszám" maxlength="16" value="<?=isset($postData) ? $postData['cardnumber'] : "";?>">
		<select name="expirationM">
			<option value="1" <?=$postData['expirationM'] == 1 ? 'selected' : '' ?> >01</option>
			<option value="2" <?=$postData['expirationM'] == 2 ? 'selected' : '' ?> >02</option>
			<option value="3" <?=$postData['expirationM'] == 3 ? 'selected' : '' ?> >03</option>
		    <option value="4" <?=$postData['expirationM'] == 4 ? 'selected' : '' ?> >04</option>
		    <option value="5" <?=$postData['expirationM'] == 5 ? 'selected' : '' ?> >05</option>
		    <option value="6" <?=$postData['expirationM'] == 6 ? 'selected' : '' ?> >06</option>
		    <option value="7" <?=$postData['expirationM'] == 7 ? 'selected' : '' ?> >07</option>
		    <option value="8" <?=$postData['expirationM'] == 8 ? 'selected' : '' ?> >08</option>
		    <option value="9" <?=$postData['expirationM'] == 9 ? 'selected' : '' ?> >09</option>
		    <option value="10" <?=$postData['expirationM'] == 10 ? 'selected' : '' ?> >10</option>
		    <option value="11" <?=$postData['expirationM'] == 11 ? 'selected' : '' ?> >11</option>
		    <option value="12" <?=$postData['expirationM'] == 12 ? 'selected' : '' ?> >12</option>
		</select>
		/
		<input type="text" name="expirationY" placeholder="Lejárati év" maxlength="2" value="<?=isset($postData) ? $postData['expirationY'] : "";?>">
		<input type="text" name="security" placeholder="Biztonsági kód" maxlength="3" value="<?=isset($postData) ? $postData['security'] : "";?>">
		<button type="submit" name="submitCard">Kártya hozzáadása</button>
	</div>
</form>
<?php endif; ?>