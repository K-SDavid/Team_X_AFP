<script src="https://cdn.jsdelivr.net/npm/p5@1.3.0/lib/p5.js"></script>

<?php
require_once USER_MANAGER;

if(!CheckLogin()):
	echo "<div><h1>Blackjack: </h1><h3>Ár: 5€ <br> Nyeremény: 10€ <br> Nyeremény 21 esetén: 20€</h3></div>";
else:
	if(array_key_exists('bs', $_GET) && !empty($_GET['bs'])){
		if(!isset($_POST['blackjacksubmit'])) {
			header("location: index.php?P=denied");
		}
	}
	?>

	<?php if(!array_key_exists('bs', $_GET) || empty($_GET['bs'])) :
		if($_SESSION['balance'] < 5) : ?>
			<form method="POST" action="index.php?P=scraper">
				<input type="submit" name="back" value="Vissza">
			</form>
			<h2>Jelenleg nincs elég pénzed ehhez a játékhoz!</h2><br>
			<div><h1>Blackjack: </h1><h3>Ár: 5€ <br> Nyeremény: 10€ <br> Nyeremény 21 esetén: 20€</h3></div>
		<?php else: ?>
			<form method="POST" action="index.php?P=scraper">
				<input type="submit" name="back" value="Vissza">
			</form>
			<form method="POST" action="index.php?P=blackjackscraper&bs=true">
				<input type="hidden" name="firstN" value="<?=rand(1, 14); ?>">
				<input type="hidden" name="secondN" value="<?=rand(1, 14); ?>">
				<input type="hidden" name="AiN" value="<?=rand(13, 18); ?>">
				<input type="submit" name="blackjacksubmit" value="Kaparok egyet">
			</form>
			<div><h1>Blackjack: </h1><h3>Ár: 5€ <br> Nyeremény: 10€ <br> Nyeremény 21 esetén: 20€</h3></div>
		<?php endif; ?>
	<?php else: ?>
		<script type="text/javascript" src="<?=PUBLIC_DIR.'script/refreshblock.js'?>"></script>
		<div class="bjscratch">	
			<?php Bet($_SESSION['uid'], 5);
				$firstN = $_POST['firstN'];
				$secondN = $_POST['secondN'];
				$AiN = $_POST['AiN'];
			 ?>
			<h2>BlackJack</h2>
			<section>
				<div class="bjcontent"><main></main></div>
				<div class="numbers">
					Osztó száma: <br>
					<?php echo $AiN; ?>
					<br><br><br>
					Ön számai: <br><br>
					<div class="playernumbers">
						<div class="firstnumber">
							<?php echo value($firstN); ?>
						</div>
						<div class="secondnumber">
							<?php echo value($secondN); ?>
						</div>
					</div>
				</div>
			</section>
			<form method="POST" action="index.php?P=scraper">
				<input type="submit" name="eredmeny" value="Vissza" onclick="<?=szum(realvalue(value($firstN)),realvalue(value($secondN))) == 21 ? Win($_SESSION['uid'], 20) : (szum(realvalue(value($firstN)),realvalue(value($secondN))) > $AiN ? Win($_SESSION['uid'], 10) : ""); ?>">
			</form>
		</div>
		<script type="text/javascript">
			function setup(){
				createCanvas(400, 200);
			}
			function draw(){
				strokeWeight(50);
				if(mouseIsPressed === true){
					line(mouseX, mouseY, pmouseX, pmouseY)
				}
			}
		</script>
	<?php endif; ?>
<?php endif; ?>

<?php function value($szam){
	if($szam == 11){
		return "J";
	} else if($szam == 12){
		return "Q";
	}
	else if($szam == 13){
		return "K";
	}
	else if($szam == 14){
		return "A";
	}
	else{
		return $szam;
	}
}

function realvalue($szam){
	$ten = 10;
	$eleven = 11;
	if($szam == 'A'){
		return $eleven;
	}else if($szam == 'K' || $szam == 'Q' || $szam == 'J'){
		return $ten;
	}
	 else{
		return $szam;
	}
}

function szum($szam1, $szam2){
	$szum = $szam1+$szam2;
	if($szum > 21){
		return 21;
	} else{
		return $szum;
	}
}
?>