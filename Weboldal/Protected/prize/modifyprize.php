<?php 
	require_once PRIZE_MANAGER;
	$prize = GetPrizeById($_GET['m']);
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$postDatamp = [
			'name' => $_POST['prizename'],
			'price' => $_POST['prizeprice']
		];
		if(empty($postDatamp['name']) || empty($postDatamp['price'])) {
			echo "Hiányzo adat(ok)!";
		} else if(strlen($postDatamp['name']) < 2 || strlen($postDatamp['name']) > 30) {
			echo "A megadott névnek 2 és 30 karakter közötti hosszúságúnak kell lennie!";
		} else if(preg_match('/\s\s+/', $postDatamp['name'])) {
			echo "A név nem tartalmazhat kettő vagy több szóközt egymás mellett!";
		} else if(!is_numeric($postDatamp['price'])) {
			echo "A megadott értéknek számnak kell lennie!";
		} else if($postDatamp['price'] < 0) {
			echo "A megadott érték nem lehet kisebb mint 0!";
		} else {
			if(!ModifyPrize($_GET['m'], $postDatamp['name'], $postDatamp['price'])) {
				echo "Sikertelen hozzáadás!";
			}
		}
	}
?>
<form method="POST">
	<div>
		<td></td>
		<td><input type="text" name="prizename" placeholder="Nyeremény neve" value="<?=$prize['name']?>"></td>
		<td><input type="text" name="prizeprice" placeholder="Ár" value="<?=$prize['price']?>"></td>
		<td></td>
		<td><input type="submit" name="submit"></td>
	</div>
</form>