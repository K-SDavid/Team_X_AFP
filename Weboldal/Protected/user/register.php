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
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "Hibás email formátum!";
	} else if ($postData['password'] != $postData['password1']) {
		echo "A jelszavak nem egyeznek!";			  
	}  else if(!is_numeric($postData['age'])) {
		echo "Az életkort számként kell megadni!";
	} else if($postData['age'] < 18) {
		echo "18 év alatt nem használhatja az oldalt!";
	} else if(strlen($postData['password']) < 6) {
		echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
	} else if(!UserRegister($postData['username'], $postData['password'], $postData['age'], $postData['email'])) {
		echo "Sikertelen regisztráció!";
	}

	$postData['password'] = $postData['password1'] = "";
}
?>

<form method="POST" class="registerform">
	<input type="text" name="username" placeholder="Felhasználónév">
	<input type="text" name="email" placeholder="Email">
	<input type="text" name="age" placeholder="Életkor">
	<input type="password" name="password" placeholder="Jelszó">
	<input type="password" name="password1" placeholder="Jelszó megerősítő">
	<input type="submit" name="submit" value="Regisztráció">
</form>