<?php if(!CheckLogin()): 
		header("Location: index.php?P=denied");
	else:
	require_once GAME_MANAGER;
      $maxbet = 0;
      $minbet = GetMinBetAmount("putto");
      if($_SESSION['permission'] == 1)
      {
        $maxbet = GetMaxBetAmount("putto")/100;
      }
      else $maxbet = GetMaxBetAmount("putto");

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['puttosubmit'])  && isset($_POST['bmezo']) && count($_POST['amezo']) == 8 && isset($_POST['puttobetamount']) && $_POST['puttobetamount'] >= $minbet && $_POST['puttobetamount'] <= $minbet):
		
		$data = PuttoRoll(); ?>
		<a href="index.php?P=putto">Vissza</a>
		<?php

		if($data[9] == 0)
		{
			echo "Sajnáljuk nem nyert!";
			}
			else
			{
				echo "Gratulálunk, nyereménye: ".$data[9]."€";
			}
			?>
			 <hr class = "nicehr">
		<div class="a-mezo">
		<table>
			<?php 
			$counter = 1;
			for ($i=0; $i < 4; $i++): ?>
				<tr>
				<?php 
				for ($j=0; $j < 5; $j++): ?>
					<td><label style="color: <?=CheckWin($counter,'a',$data)?>" value="<?=$counter?>"><?=$counter?></td>
					<?php $counter++; 
				endfor;?>
				</tr>
			<?php endfor; ?>
		</table>
	</div>
	<hr class="nicehr">
	<div class="b-mezo">
		<?php for ($i=1; $i < 5; $i++): ?> 
			<label style="color: <?=CheckWin($i,'b',$data)?>" value="<?=$i?>"><?=$i?>				
		<?php endfor; ?> 
	</div>
<?php else: ?>
</div>
<form method="POST" style="text-align: center;">
<div class="a-mezo">
	<table>
		<?php 
		$counter = 1;
		for ($i=0; $i < 4; $i++): ?>
			<tr>
			<?php 
			for ($j=0; $j < 5; $j++): ?>
				<td><input type="checkbox" name="amezo[]" value="<?=$counter?>"><?=$counter?></td>
				<?php $counter++; 
			endfor;?>
			</tr>
		<?php endfor; ?>
	</table>
</div>
<hr class="nicehr">
<div class="b-mezo">
	<?php for ($i=1; $i < 5; $i++): ?> 
		<input type="radio" name="bmezo" value="<?=$i?>"><?=$i?>		
	<?php endfor;?>
</div>
<hr class="nicehr">	
      <h3>Minimum összeg:<?=$minbet?>€ &nbsp;&nbsp;&nbsp;&nbsp; Maximum összeg:<?=$maxbet?>€</h3>      
<hr class="nicehr">
<input type="number" name="puttobetamount" placeholder="1€">
<input type="submit" name="puttosubmit">
</form>
<?php endif; endif; ?>


<?php 
function CheckWin($number,$field,$data){
	$coun = 0;
	$aarray = array_slice($data, 0,8);
	if($field == 'a'){
		if(in_array($number, $aarray) && !in_array($number, $_POST['amezo'])){
			return "yellow";
		}
		elseif (in_array($number, $aarray) && in_array($number, $_POST['amezo'])) {
			return "green";
		}
		elseif (!in_array($number, $aarray) && in_array($number, $_POST['amezo'])) {
			return "red";
		}
		else return "white";
	}
	elseif($field == 'b')
	{
		if($number == $data[8] && $number != $_POST['bmezo']){
			return "yellow";
		}
		elseif ($number == $data[8] && $number == $_POST['bmezo']) {
			return "green";
		}
		elseif ($number != $data[8] && $number == $_POST['bmezo']) {
			return "red";
		}
		else return "white";
	}		
	return "white";
}

function PuttoRoll(){
	$nyeroa = range(1, 20);
    shuffle($nyeroa);
    $nyeroa = array_slice($nyeroa, 0, 8);
	
	$nyerob = rand(1,4);
	$atalalt = 0;
	$btalalt = false;
	$betamount= $_POST['puttobetamount'];
	$szorzo = 0;

	for ($i=0; $i < 8; $i++) { 
		for ($j=0; $j < 8; $j++) { 
			if($nyeroa[$i] == $_POST['amezo'][$j]){
				$atalalt = $atalalt +1 ;
				break;
			}
		}
	}
	if($nyerob == $_POST['bmezo']){
		$btalalt = true;
	}
	switch ($atalalt) {
		case 4:
			if($btalalt)
				$szorzo = 1;
			break;
		case 5:
			if($btalalt)
				$szorzo = 4;
			else $szorzo = 2;
			break;	
		case 6:
			if($btalalt)
				$szorzo = 24;
			else $szorzo = 8;
			break;	
		case 7:
			if($btalalt)
				$szorzo = 150;
			else $szorzo = 50;
			break;	
		case 8:
			if($btalalt)
				$szorzo = 10000;
			else $szorzo = 1000;
			break;
		default:		
			break;
	}

	$puttodata = [];
	for ($i=0; $i < 10; $i++) { 
		if($i == 8){
			$puttodata[8] = $nyerob;
		}
		elseif($i == 9){
			$puttodata[9] = $betamount * $szorzo;
		}
		else{
		$puttodata[$i] = $nyeroa[$i];
		}
	}
	return $puttodata;
}

?>