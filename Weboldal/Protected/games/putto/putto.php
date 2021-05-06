<?php if(!CheckLogin()): 
		require_once PROTECTED_DIR."games/putto/puttorule.php";
	else:
	require_once GAME_MANAGER;
      $maxbet = 0;
      $minbet = GetMinBetAmount("putto");
      if($_SESSION['permission'] == 1)
      {
        $maxbet = GetMaxBetAmount("putto")/100;
      }
      else $maxbet = GetMaxBetAmount("putto");

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['puttosubmit'])  && isset($_POST['bmezo']) && isset($_POST['amezo']) && count($_POST['amezo']) == 8 && isset($_POST['puttobetamount']) && $_POST['puttobetamount'] >= $minbet && $_POST['puttobetamount'] <= $maxbet && $_SESSION['balance'] >= $_POST['puttobetamount']):
		Bet($_SESSION['uid'],$_POST['puttobetamount'] );
		$data = PuttoRoll(); ?>
		<a href="index.php?P=putto">Vissza</a>
		<br>
		<?php
		if($data[9] == 0)
		{
			echo "Sajnáljuk nem nyert!";
		}
		else
		{
			Win($_SESSION['uid'],$data[9]);			
			echo "Gratulálunk, nyereménye: ".$data[9]."€";
		}?>
		<br><br>
		<hr class = "nicehr"><div>
		<?php for ($i=1; $i < 5; $i++): ?> 
			<div class="mezo"> 
			<label style="color: <?=CheckWin($i,'b',$data)?>" value="<?=$i?>"><?=$i?>				
			</div>
		<?php endfor; ?> 
		</div>						
		<h3 style="margin-bottom: 10px;">B mező:</h3>	
		<hr class="nicehr">		
		<?php $counter = 20; 			
			for ($i=0; $i < 4; $i++): ?>				
				<div style="display:flex; flex-direction: row-reverse;">
				<?php
				for ($j=0; $j < 5; $j++): ?>
					<div class="mezo">
					<label style="color: <?=CheckWin($counter,'a',$data)?>" value="<?=$counter?>"><?=$counter?>
					</div>
					<?php $counter--; 
				endfor;?>
				</div>	
			<?php endfor; ?>
			<h3 style="margin-bottom: 10px;">A mező:</h3>
			<div class="sugoh"><i class="fa fa-question-circle-o">
				<div class="sugo">
					Színek a kiértékelésnél: <br>
					-zöld: A számot megjátszotta a felhasználó és talált <br>
					-piros: A számot megjátszotta a felhasználó és nem talált <br>
					-sárga: A számot nem játszotta meg a felhasználó, viszont kihúzták
				</div>
				</i>
			</div>
	<?php else: ?>
	</div>
	<form method="POST" style="text-align: center; width: 90%;">
		<div class="z-bigger">		
			<h3 style="margin-bottom: 10px;">A mező:</h3>
				<?php 
				$counter = 1;
				for ($i=0; $i < 4; $i++): ?>					
					<?php 
					for ($j=0; $j < 5; $j++): ?>
						<input class="checkbox-putto" type="checkbox" id="putto-<?=$counter?>" name="amezo[]" value="<?=$counter?>">
						<label class="for-checkbox-putto" for="putto-<?=$counter?>">
							<span data-hover="<?=$counter?>"><?=$counter?></span>
						</label>
						<?php $counter++; 
					endfor;?><br>
				<?php endfor; ?>			
			<hr class="nicehr">
			<h3 style="margin-bottom: 10px;">B mező:</h3>
				<?php for ($i=1; $i < 5; $i++): ?> 
					<input class="checkbox-putto" type="radio" id="puttob-<?=$i?>" name="bmezo" value="<?=$i?>">
							<label class="for-checkbox-putto" for="puttob-<?=$i?>">
								<span data-hover="<?=$i?>"><?=$i?></span>
							</label>		
				<?php endfor;?>
		</div>
		<hr class="nicehr">	
	    <h3>Minimum összeg:<?=$minbet?>€ &nbsp;&nbsp;&nbsp;&nbsp; Maximum összeg:<?=$maxbet?>€</h3>      
		<hr class="nicehr">
		<input type="number" name="puttobetamount" placeholder="1€">
		<input type="submit" name="puttosubmit">
		<p style="margin-top:50px;"><a href="index.php?P=puttorules">Ide kattintva megtekintheti a szabályzatot!</a></p>
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