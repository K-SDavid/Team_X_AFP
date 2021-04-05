<?php 
require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=denied");	
	else:
		if(array_key_exists('c',$_GET) && !empty($_GET['c'])):	
			$percent = [55,25,18,1.2,0.6,0.15,0.04,0.01];			
			switch ($_GET['c']) {
				case 'bronze':
					$amount = [0.5,1,1.6,20,50,250,1500,7500];
					$price=50;
					break;
				case 'silver':
					$amount = [3,5,10,150,500,1500,7500,32500];
					$price=250;					
					break;
				case 'gold':
					$amount = [10,20,35,500,2000,9500,35000,125000];
					$price=1000;
					break;
				case 'diamond':
					$amount = [100,250,350,1250,8500,25000,95000,500000];
					$price=4500;
					break;
				default:
					header("Location:index.php?P=prizes");
					break;
			}	
			$openstring="index.php?P=prizes&c=open-{$_GET['c']}";	
			?>
			<?php if(strlen($_GET['c'])<8):?>
				<?php if($_SESSION['xcoin']<$price): ?>					
					<h1>Nincs elég X-Coinja ehhez a ládához!</h1>
					<hr style="width:90%; margin-bottom: 30px; margin-top: 20px;">
				<?php else: ?>					
					<a href="<?=$openstring?>">Kinyitás</a>
					<hr style="width:85%; margin-bottom: 30px; margin-top: 20px;">

				<?php endif; ?>
			<table >
				<tbody>					
					<tr>
						<?php for($i = 0; $i<8;$i++): ?>
							<th><?=$percent[$i]?>%</th>
						<?php endfor; ?>
					</tr>
					<tr>
						<?php for($i = 0; $i<8;$i++): ?>
							<th><?=$amount[$i]?>€</th>
						<?php endfor; ?>
					</tr>
				</tbody>
			</table>
			<hr style="width:90%; margin: 30px;">
			<h1>Nyerési esélyek</h1>
		<?php else: ?>	
			
		<?php endif; ?>
		<hr style="width:90%; margin: 30px;">
		<img src="<?=PUBLIC_DIR."Pictures/xcoin-chest/{$_GET['c']}-chest.png"?>">
	

	<?php else: ?>
	 	<?php require_once PROTECTED_DIR."games/xcoin-chest/chest.php";?>
		<h1>X-Coinból nyitható ládák</h1>
		<hr style="width:90%; margin: 30px;">
	<?php require_once PROTECTED_DIR."prize/listprize.php";?>
		<hr style="width:90%; margin-bottom: 30px; margin-top: 20px;">
		<h1>Kiváltható nyeremények</h1>
	<?php endif; endif;?>

