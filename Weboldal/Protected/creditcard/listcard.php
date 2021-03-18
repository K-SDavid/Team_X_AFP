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
					<?php $f=16 - strlen($c['cardnumber']); ?>
					<tr>
						<th><?=$i?></th>
						<td><?=$c['name'] ?></td>
						<td><?php for ($j=0; $j < $f; $j++) {
							echo "0";
						} echo $c['cardnumber']; ?></td>
						<td><?=strlen($c['expiration']) == 3 ? '0'.substr($c['expiration'],0,1).'/'.substr($c['expiration'],1,2) : substr($c['expiration'],0,2).'/'.substr($c['expiration'],2,2) ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<?php else: ?>
			<h1>Nincs kártya hozzáadva!</h1>
		<?php endif; ?>
<?php endif; ?>