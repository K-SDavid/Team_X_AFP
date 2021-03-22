<?php 
require_once CARD_MANAGER;
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {		
		if(empty($_POST['amount'])){
			echo "Kérjük adja meg a kiváltani kívant összeget!";
		} else if(!is_numeric($_POST['amount'])){
			echo "Kérjük csak számot adjon meg!";
		} else if($_POST['amount'] <= 0){
			echo "A megadott érték nem lehet 0 vagy kisebb!";
		} else if($_POST['amount'] > $_SESSION['balance']){
			echo "A beírt összeg meghaladja az ön egyenlegét!";
		}
		else{
			Withdraw($_SESSION['uid'],$_POST['amount']);
		}
}
$cards = ListCard($_SESSION['uid']);
if(	!CheckCard($_SESSION['uid'])):
	echo "Nincs kártya hozzáadva!";
else:

?>

<div class="withdrawform">
	Válassza ki melyik kártyára szeretné kiváltani az alább megadott összeget:	
	<select name="cardnumbers">
		<?php foreach($cards as $c): ?>
			<option value="<?=$c['id']?>"><?=$c['cardnumber']?></option>
		<?php endforeach; ?>
	</select>
	<br>
	<form method="POST"> 
		<div class = "amount-text">
			<input type="text" name="amount" placeholder="Kiváltandó összeg">
		</div>	
		<br>
		<input type="submit" name="submit" value="Kivétel">
	</form>
</div>
<?php  endif; ?> 