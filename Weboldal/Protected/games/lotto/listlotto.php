<?php 
require_once USER_MANAGER;
if (!CheckLogin()):
	header("Location: index.php?P=denied");
else:
	require_once 'lottomanager.php';
	if(array_key_exists('d',$_GET) && !empty($_GET['d']))
	{
		require_once PROTECTED_DIR."normal/submit.php";
		if(Submit() == 1) {
			DeleteLotto($_GET['d']);
		} else if(Submit() == 0) {
			header('Location: index.php?P=listlotto');
		}
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['back'])) {
		header("Location: index.php?P=lotto");
	}
	$lottos = ListLotto();
	if ($_SESSION['permission'] < 3) :
		$lt = [];
		foreach ($lottos as $l) {
			if ($l['userid'] == $_SESSION['uid']) {
				array_push($lt, $l);
			}
		}
		if(count($lt) > 0): ?>
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>1.szám</th>
						<th>2.szám</th>
						<th>3.szám</th>
						<th>4.szám</th>
						<th>5.szám</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 0; ?>
					<?php foreach ($lt as $l):
					$i++;?>
					<tr>
						<th><?=$i?></th>
						<td><?=$l['first']?></td>
						<td><?=$l['second']?></td>
						<td><?=$l['third']?></td>
						<td><?=$l['fourth']?></td>
						<td><?=$l['fifth']?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		<?php else: ?>
			<h1>Ön még nem rendelkezik lottószámokkal!</h1>
		<?php endif; ?>
	<?php else: 
		if (count($lottos) > 0): ?>
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Felhasználó</th>
						<th>1.szám</th>
						<th>2.szám</th>
						<th>3.szám</th>
						<th>4.szám</th>
						<th>5.szám</th>
						<th>Törlés</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 0; ?>
					<?php foreach ($lottos as $l):
					$i++;?>
					<tr>
						<th><?=$i?></th>
						<td><?=GetUsernameById($l['userid'])?></td>
						<td><?=$l['first']?></td>
						<td><?=$l['second']?></td>
						<td><?=$l['third']?></td>
						<td><?=$l['fourth']?></td>
						<td><?=$l['fifth']?></td>
						<td><a href="?P=listlotto&d=<?=$l['id']?>">X</a></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		<?php else: ?>
			<h1>Még nincsenek megjátszott számok az ötöslottóra!</h1>
		<?php endif; ?>
	<?php endif; ?>
	<form method="POST">
		<input type="submit" name="back" value="Vissza">
	</form>
<?php endif; ?>