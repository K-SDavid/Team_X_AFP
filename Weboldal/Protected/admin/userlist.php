<?php
	require_once USER_MANAGER;
	if(!CheckLogin() || $_SESSION['permission'] < 3):
		header("Location: index.php?P=denied");
	else:
		if(array_key_exists('d',$_GET) && !empty($_GET['d']))
		{
			require_once PROTECTED_DIR."normal/submit.php";
			if(Submit() == 1) {
				DeleteUser($_GET['d']);
			} else if(Submit() == 0) {
				header('Location: index.php?P=userlist');
			}
		}
		
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
			if(empty($_POST['search'])) {
				echo "Kérem adja meg a keresni kívánt szöveget!";
				$users = UserList();
			} else {
				if(count(SearchUser($_POST['search'])) < 1) {
					$users = UserList();
					echo "Nem található ilyen nevű felhasználó!";					
				} else {
					$users = SearchUser($_POST['search']);
				}
			}
		} else {
			$users = UserList();
		}
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
					<th>Módosítás</th>
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
						<td><a href="?P=userlist&m=<?=$u['id']?>">X</a></td>
						<?php if($u['permission'] < 3): ?>
							<td><a href="?P=userlist&d=<?=$u['id']?>">X</a></td>
						<?php endif; ?>
					</tr>
					<?php if(array_key_exists('m',$_GET) && !empty($_GET['m']) && $u['id'] == $_GET['m']): ?>
						<?php require_once 'modifyuser.php'; ?>
					<?php endif;?>
				<?php endforeach;?>
			</tbody>
			</table>
			<form method="POST">
				<input type="text" name="search" placeholder="Keresendő felhasználó">
				<input type="submit" name="submit" value="Keresés">
			</form>
		<?php else: ?>
			<h1>Nem található regisztrált felhasználó!</h1>
		<?php endif; ?>
	<?php endif; ?>