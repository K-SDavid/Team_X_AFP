<?php 
if(!CheckLogin()):
	header("Location: index.php?P=denied");
else:
	require_once CARD_MANAGER;
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {		
			if(!empty($_POST['amount'])){
				Deposit($_SESSION['uid'],$_POST['amount']);
			}
			else{
				echo "Válassza ki a feltölteni kívánt összeget!";
			}
	}
	$cards = ListCard($_SESSION['uid']);
	if(	!CheckCard($_SESSION['uid'])):
		echo "<h1>Nincs kártya hozzáadva!</h1>";
	else:

	?>

	<div class="dwform">
		Válassza ki melyik kártyával szeretne fizetni:	
		<select name="amount">
			<?php foreach($cards as $c): ?>
				<option value="<?=$c['id']?>"><?=$c['cardnumber']?></option>
			<?php endforeach; ?>
		</select>
		<br>
		<form method="POST" class="depositradio"> 
			<div class = "amount-buttons">
				<input type="radio" id="10" name="amount" value="10">
				<label for="10">10€</label>
				<input type="radio" id="25" name="amount" value="25">
				<label for="25">25€</label>
				<input type="radio" id="50" name="amount" value="50">
				<label for="50">50€</label>
				<input type="radio" id="100" name="amount" value="100">
				<label for="100">100€</label>
				<input type="radio" id="250" name="amount" value="250">
				<label for="250">250€</label>
				<input type="radio" id="500" name="amount" value="500">
				<label for="500">500€</label>
				<input type="radio" id="1000" name="amount" value="1000">
				<label for="1000">1000€</label>
				<input type="radio" id="5000" name="amount" value="5000">
				<label for="5000">5000€</label>		
			</div>
			<input type="submit" name="submit" value="Feltöltés">
		</form>
	</div>
	<?php  endif; ?> 
<?php  endif; ?> 