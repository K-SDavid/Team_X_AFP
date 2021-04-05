<?php function Submit() {
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['1'])) {
		return 1;
	} 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['0'])) {
		return 0;
	}
	return -1;
} ?>
<div class="submitpopup">
	<form method="POST">
		<label>Biztosan szeretné folytatni?</label>
		<div>
			<input type="submit" name="1" value="Igen">
			<input type="submit" name="0" value="Mégse">
		</div>
	</form>
</div>