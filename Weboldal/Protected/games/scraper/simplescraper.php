<?php
require_once USER_MANAGER;

if(!CheckLogin()):
	echo "<h3>Egyszerű kaparós sorsjegy <br> Ár: 2€ <br> Nyeremény: 10€</h3> <br> <h1>Játékleírás: </h1>";
else:
	if(array_key_exists('ss', $_GET) && !empty($_GET['ss'])){
		if(!isset($_POST['scratchsubmit'])) {
			header("location: index.php?P=denied");
		}
	}

	function chance(){
		$chance = rand(0,100);
		switch ($chance) {
			case ($chance<20):
				return 1;
			case ($chance<100):
				return 0;
			default:
				return 0;
				break;
		}	
	}
	?>

	<?php if(!array_key_exists('ss', $_GET) || empty($_GET['ss'])) :
		if($_SESSION['balance'] < 2) : ?>
			<h2>Jelenleg nincs elég pénzed ehhez a játékhoz!</h2>
			<h3>Egyszerű kaparós sorsjegy <br> Ár: 2€ <br> Nyeremény: 10€</h3> <br> <h1>Játékleírás: </h1>
		<?php else: ?>
			<form method="POST" action="index.php?P=scraper&ss=true">
				<input type="hidden" name="cV" value="<?=$result = chance(); ?>">
				<input type="submit" name="scratchsubmit" value="Kaparok egyet">
			</form>
			<h3>Egyszerű kaparós sorsjegy <br> Ár: 2€ <br> Nyeremény: 10€</h3> <br> <h1>Játékleírás: </h1>
		<?php endif; ?>
	<?php else: ?>
		</script>
		<div class="scratch">	
			<?php Bet($_SESSION['uid'], 2);
				$cv = $_POST['cV'];
			 ?>
			<h2>Kaparja le a fehér mezőt!</h2>
			<section>
				<div class="content"><main></main></div>
				<p><?=$_POST['cV'] == 1 ? 'Gratulálunk ön nyert!' : 'Sajnos most nem nyert!'; ?></p>
			</section>
			<form method="POST" action="index.php?P=scraper">
				<input type="submit" name="win" value="Jutalom begyűjtése" onclick="<?=$_POST['cV'] == 1 ? Win($_SESSION['uid'], 10) : "" ?>">
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

