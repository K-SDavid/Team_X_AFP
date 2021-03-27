<?php
	require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=denied");
	else:
		require_once PRIZE_MANAGER;
		$prizes = ListPrize();
		if(count($prizes) > 0): ?>
			<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Név</th>
					<th>Ár</th>
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
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<?php else: ?>
			<h1>Jelenleg nincs kiváltható nyeremény!</h1>
		<?php endif; ?>
<?php endif; ?>