<?php 
require_once USER_MANAGER;
	if(!CheckLogin() || $_SESSION['permission'] < 3):
		header("Location: index.php?P=denied");
	else:
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modify'])) {
			$postData = [
				'balance' => $_POST['balance'],
				'xcoin' => $_POST['xcoin']
			];
			if (!is_numeric($postData['balance']) || !is_numeric($postData['xcoin'])) {
				echo "A megadott adatok csak számok lehetnek!";
			} else if ($postData['balance'] < 0 || $postData['xcoin'] < 0) {
				echo "Egyik érték sem lehet kisebb mint 0!";
			} else {
				if(!ModifyUser($_GET['m'], $postData['balance'], $postData['xcoin'])) {
					echo "Hiba a felhasználó adatainak módosításában!";
				}
			}
		}
?>
	<tr>
		<form method="POST">
			<div>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><input type="text" name="balance" value="<?=GetBalanceById($_GET['m'])?>"></td>
				<td><input type="text" name="xcoin" value="<?=GetXCoinById($_GET['m'])?>"></td>
				<td><input type="submit" name="modify" value="Módosítás"></td>
			</div>
		</form>
	</tr>
<?php endif; ?>