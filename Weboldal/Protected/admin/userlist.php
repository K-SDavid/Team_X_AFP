<?php
	require_once USER_MANAGER;
	if(!CheckLogin() || $_SESSION['permission'] < 3):
		header("Location: index.php?P=denied");
	else:
		if(array_key_exists('d',$_GET) && !empty($_GET['d']))
		{
			DeleteUser($_GET['d']);
		}
		$users = UserList();
		if(count($users) > 0): ?>
			<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Felhasználónév</th>
					<th>Email</th>
					<th>Életkor</th>
					<th>Egyenleg</th>
					<th>X-Coin</th>
					<th>Befizetett összeg</th>
					<th>Kiváltott összeg</th>
					<th>Jogosultság</th>
					<th>Kitiltás</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $u) : ?>
					<tr>
						<th><?=$u['id']?></th>
						<td><?=$u['username']?></td>
						<td><?=$u['email']?></td>
						<td><?=$u['age']?></td>
						<td><?=$u['balance']?></td>
						<td><?=$u['xcoin']?></td>
						<td><?=$u['deposit']?></td>
						<td><?=$u['withdraw']?></td>
						<td><?=$u['permission']?></td>
						<td><a href="?P=userlist&d=<?=$u['id']?>">X</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
			</table>
		<?php else: ?>
			<h1>Nem található regisztrált felhasználó!</h1>
		<?php endif; ?>
	<?php endif; ?>