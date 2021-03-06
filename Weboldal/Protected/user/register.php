<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$postData = [
		'username' => $_POST['username'],
		'email' => $_POST['email'],
		'age' => $_POST['age'],
		'password' => $_POST['password'],
		'password1' => $_POST['password1']
	];

	if(empty($postData['username']) ||  empty($postData['email']) || empty($postData['age']) || empty($postData['password']) || empty($postData['password1'])) {
		echo "Hiányzó adat(ok)!";
	} else if(strlen($postData['username']) < 5) {
		echo "A felhasználónév túl rövid! Legalább 5 karakter hosszúnak kell lennie!";
	} else if(1 === preg_match('~[ ]~', $postData['username'])) {
		echo "A név nem tartalmazhat szóközt!";
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "Hibás email formátum!";
	} else if(!is_numeric($postData['age'])) {
		echo "Az életkort számként kell megadni!";
	} else if($postData['age'] < 18) {
		echo "18 év alatt nem használhatja az oldalt!";
	} else if($postData['age'] > 100) {
		echo "Érvénytelen életkor!";
	} else if(strlen($postData['password']) < 6) {
		echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
	} else if(1 === preg_match('~[ ]~', $postData['password'])) {
		echo "A jelszó nem tartalmazhat szóközt!";
	} else if ($postData['password'] != $postData['password1']) {
		echo "A jelszavak nem egyeznek!";			  
	} else if(!UserRegister($postData['username'], $postData['password'], $postData['age'], $postData['email'])) {
		echo "Sikertelen regisztráció!";
	}

	$postData['password'] = $postData['password1'] = "";
}
?>

<form method="POST" class="registerform">
	<input type="text" name="username" placeholder="Felhasználónév" value="<?=isset($postData) ? $postData['username'] : "";?>">
	<input type="text" name="email" placeholder="Email" value="<?=isset($postData) ? $postData['email'] : "";?>">
	<input type="text" name="age" placeholder="Életkor" value="<?=isset($postData) ? $postData['age'] : "";?>">
	<div><div class="pwinput"><input type="password" name="password" placeholder="Jelszó" id="rpassword"><i id="r1" class="fa fa-eye" aria-hidden="true" onclick="showrpw()"></i></div></div>
	<div><div class="pwinput"><input type="password" name="password1" placeholder="Jelszó megerősítő" id="r2password"><i id="r2" class="fa fa-eye" aria-hidden="true" onclick="showr2pw()"></i></div></div>
	<input type="submit" name="submit" value="Regisztráció">
</form>