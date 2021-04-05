<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		$postDataap = [
			'name' => $_POST['prizename'],
			'price' => $_POST['prizeprice']
		];
		if(empty($postDataap['name']) || empty($postDataap['price'])) {
			echo "Hiányzo adat(ok)!";
		} else if(strlen($postDataap['name']) < 2 || strlen($postDataap['name']) > 30) {
			echo "A megadott névnek 2 és 30 karakter közötti hosszúságúnak kell lennie!";
		} else if(preg_match('/\s\s+/', $postDataap['name'])) {
			echo "A név nem tartalmazhat kettő vagy több szóközt egymás mellett!";
		} else if(!is_numeric($postDataap['price'])) {
			echo "A megadott értéknek számnak kell lennie!";
		} else if($postDataap['price'] < 0) {
			echo "A megadott érték nem lehet kisebb mint 0!";
		} else {
			require_once PRIZE_MANAGER;
			if(!AddPrize($postDataap['name'], $postDataap['price'])) {
				echo "Sikertelen hozzáadás!";
			}
		}
	}
?>
<form method="POST" class="addPF">
	<input type="text" name="prizename" placeholder="Nyeremény neve" value="<?=isset($postDataap) ? $postDataap['name'] : ""?>">
	<input type="text" name="prizeprice" placeholder="Ár" value="<?=isset($postDataap) ? $postDataap['price'] : ""?>">
	<input type="submit" name="submit" value="Hozzáadás">
</form>