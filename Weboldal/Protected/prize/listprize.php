<?php
	require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=denied");
	else:
		require_once PRIZE_MANAGER;
		$prizes = ListPrize();
		if(array_key_exists('d',$_GET) && !empty($_GET['d'])) {
			require_once PROTECTED_DIR."normal/submit.php";
			if(Submit() == 1) {
				DeletePrize($_GET['d']);
			} else if(Submit() == 0) {
				header('Location: index.php?P=prizes');
			}
		}
		if(array_key_exists('r',$_GET) && !empty($_GET['r']))
		{
			$query = "SELECT price FROM prizes WHERE id = :id";
			$params = [ 'id' => $_GET['r'] ];
			require_once DATABASE_CONTROLLER;
			$price = getField($query, $params);
			if($price <= $_SESSION['xcoin'])
			{
				require_once PROTECTED_DIR."normal/submit.php";		
				if(Submit() == 1){
					RedeemPrize($_SESSION['uid'],$_GET['r']);
					header("Location: index.php?P=prizes");	
				}
				else if(Submit() == 0)
				{
					header("Location: index.php?P=prizes");	
				}		
			}
			else echo "Nincs elég X-Coin!";
		}
		if(count($prizes) > 0): ?> 
			<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Név</th>
					<th>Ár</th>
					<th>Kiváltás</th>
					<?php if ($_SESSION['permission'] > 2): ?>
						<th>Módosítás</th>
						<th>Törlés</th>
					<?php endif;?>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($prizes as $p) : ?>
					<?php $i++; ?>
					<tr>
						<th><?=$i?></th>
						<td><?=$p['name'] ?></td>
						<td><?=$p['price'] ?></td>
						<td><a href="?P=prizes&r=<?=$p['id']?>">X</a></td>
						<?php if ($_SESSION['permission'] > 2): ?>
							<td><a href="?P=prizes&m=<?=$p['id']?>">X</a></td>
							<td><a href="?P=prizes&d=<?=$p['id']?>">X</a></td>
					<?php endif;?>
					</tr>
				<?php if(array_key_exists('m',$_GET) && !empty($_GET['m']) && $p['id'] == $_GET['m']): ?>
					<?php require_once 'modifyprize.php'; ?>
				<?php endif;?>
				<?php endforeach;?>
			</tbody>
		</table>
		<?php else: ?>
			<h1>Jelenleg nincs kiváltható nyeremény!</h1>
		<?php endif;
		if($_SESSION['permission'] > 2): ?>
			<hr width="90%">
			<?php require_once PROTECTED_DIR."prize/addprize.php" ?>
			<input type="submit" name="addprize" value="Nyeremény hozzáadása" onclick="toggleaddP()">
		<?php endif;
endif; ?>