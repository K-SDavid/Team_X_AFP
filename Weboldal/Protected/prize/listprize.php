<?php
	require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=denied");
	else:
		require_once PRIZE_MANAGER;
		$prizes = ListPrize();
		if(array_key_exists('r',$_GET) && !empty($_GET['r']))
		{
			$query = "SELECT price FROM prizes WHERE id = :id";
			$params = [ 'id' => $_GET['r'] ];
			require_once DATABASE_CONTROLLER;
			$price = getField($query, $params);
			if($price <= $_SESSION['xcoin'])
			{
			RedeemPrize($_SESSION['uid'],$_GET['r']);
			header("Location: index.php?P=prizes");			
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
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<?php else: ?>
			<h1>Jelenleg nincs kiváltható nyeremény!</h1>
		<?php endif; ?>
<?php endif; ?>