<?php
require_once USER_MANAGER;
if (!CheckLogin() || $_SESSION['permission'] < 3):
	header("Location: index.php?P=denied");
else:
	require_once 'lottomanager.php';
	//$s = [1, 2, 3, 4, 5];
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reward'])) {
		if(!is_numeric($_POST['hit1']) || !is_numeric($_POST['hit2']) || !is_numeric($_POST['hit3']) || !is_numeric($_POST['hit4']) || !is_numeric($_POST['hit5'])) {
			echo "A megadott értékek csak számok lehetnek!";
		} else if($_POST['hit1'] < 0 || $_POST['hit2'] < 0 || $_POST['hit3'] < 0 || $_POST['hit4'] < 0 || $_POST['hit5'] < 0) {
			echo "Nem lehetnek negatív számok!";
		} else {
			Reward($lw, $_POST['hit1'], $_POST['hit2'], $_POST['hit3'], $_POST['hit4'], $_POST['hit5']);
		}
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['back'])) {
		header("Location: index.php?P=lotto");
	}
	$lw = LottoRoll();
?>
	<form method="POST">
		<input type="submit" name="back" value="Vissza">
	</form>
	<form method="POST">
		<input type="text" name="hit1" placeholder="1 találat jutalom">
		<input type="text" name="hit2" placeholder="2 találat jutalom">
		<input type="text" name="hit3" placeholder="3 találat jutalom">
		<input type="text" name="hit4" placeholder="4 találat jutalom">
		<input type="text" name="hit5" placeholder="5 találat jutalom">
		<input type="submit" name="reward" value="Jutalom kiosztása">
	</form>
	<table>
		<thead>
			<tr>
				<th>Összes vásárolt lottó</th>
				<th>1 találat</th>
				<th>2 találat</th>
				<th>3 találat</th>
				<th>4 találat</th>
				<th>5 találat</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?=count(ListLotto())?></td>
				<td><?=CountLotto($lw, 1)?></td>
				<td><?=CountLotto($lw, 2)?></td>
				<td><?=CountLotto($lw, 3)?></td>
				<td><?=CountLotto($lw, 4)?></td>
				<td><?=CountLotto($lw, 5)?></td>
			</tr>
		</tbody>
	</table>
	<?php foreach ($lw as $c) {
		echo $c.' ';
	} ?>
	<h2>Nyerőszámok:</h2>
<?php
?>
<?php endif; ?>