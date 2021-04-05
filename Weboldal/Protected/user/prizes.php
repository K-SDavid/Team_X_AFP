<?php 
require_once USER_MANAGER;
	if(!CheckLogin()):
		header("Location: index.php?P=denied");	
	else:
		if(array_key_exists('c',$_GET) && !empty($_GET['c'])):				
			$percent = [55,25,18,1.2,0.6,0.15,0.04,0.01];		
			$success = false;	
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
				case 'open-bronze':
					$amount = [0.5,1,1.6,20,50,250,1500,7500];
					if($_SESSION['xcoin']>=50)					
						$success = SpendXcoin($_SESSION['uid'],50);					
					break;
				case 'open-silver':
					$amount = [3,5,10,150,500,1500,7500,32500];
					$success = SpendXcoin($_SESSION['uid'],250);
					break;
				case 'open-gold':
					$amount = [10,20,35,500,2000,9500,35000,125000];
					$success = SpendXcoin($_SESSION['uid'],1000);					
					break;
				case 'open-diamond':
					$amount = [100,250,350,1250,8500,25000,95000,500000];	
					$success = SpendXcoin($_SESSION['uid'],4500);			
					break;
				default:
					header("Location:index.php?P=prizes");
					break;
			}			
			$openstring="index.php?P=prizes&c=open-{$_GET['c']}";
			if(!$success & strlen($_GET['c'])>8){
					header("Location:index.php?P=denied");
			}
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
			<a href="index.php?P=prizes">Vissza a főoldalra</a>
			<hr style="width:90%; margin: 30px;">		
			<?php			
				$number = (XcoinChestRoll());	
				Win($_SESSION['uid'],$amount[$number]);
				echo "Gratulálunk! Nyereménye:".$amount[$number]."€";				
			?>
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

<?php 
function XcoinChestRoll(){
	$number = rand(0,100000);
	switch ($number) {
		case ($number<10):
			return 7;
		case ($number<50):
			return 6;
		case ($number<200):
			return 5;
		case ($number<800):
			return 4;
		case ($number<2000):
			return 3;
		case ($number<20000):
			return 2;
		case ($number<45000):
			return 1;
		default:
			return 0;
			break;
	}	
}
 ?>