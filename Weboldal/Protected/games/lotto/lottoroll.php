<?php
require_once USER_MANAGER;
if (!CheckLogin() || $_SESSION['permission'] < 3):
	header("Location: index.php?P=denied");
else:
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['back'])) {
		header("Location: index.php?P=lotto");
	}
	require_once 'lottomanager.php';
	$lw = [$_POST['numbers1'],$_POST['numbers2'],$_POST['numbers3'],$_POST['numbers4'],$_POST['numbers5']];
?>
	<form method="POST">
		<input type="submit" name="back" value="Vissza">
	</form>
	<h3>Jutalmak kiosztva!</h3>
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
	<?php Reward($lw, 0, 25, 300, 5000, 10000000); ?>
<?php endif; ?>