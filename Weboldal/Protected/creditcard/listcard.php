<?php
	require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=denied");
	else:
		require_once CARD_MANAGER;
		$cards = ListCard($_SESSION['uid']);
		if(count($cards) > 0): ?>
			<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Név</th>
					<th>Kártyaszám</th>
					<th>Lejárati dátum</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($cards as $c) : ?>
					<?php $i++; ?>
					<tr>
						<th><?=$i?></th>
						<td><?=$c['name'] ?></td>
						<td><?=$c['cardnumber'] ?></td>
						<td><?=$c['expiration'] ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<?php else: ?>
			<h1>Nincs kártya hozzáadva!</h1>
		<?php endif; ?>
<?php endif; ?>