<?php
	function Submit() {
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['yes'])) {
			return 1;
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['no'])) {
			return 0;
		}
		return -1;
	}
	
?>
<div class="submitpopup">
	<form method="POST">
		<label>Biztosan szeretné folytatni?</label>
		<div>
			<input type="submit" name="yes" value="Igen">
			<input type="submit" name="no" value="Mégse">
		</div>
	</form>
</div>