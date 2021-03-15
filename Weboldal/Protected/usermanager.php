<?php 
function UserRegister($username, $password, $age, $email) {
	$query = "SELECT id FROM users WHERE username = :username, email = :email";
	$params = [ ':username' => $username,
				':email' => $email ];
	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO users (username, password, age, email) VALUES (:username, :password, :age, :email)";
		$params = [
			':username' => $username,
			':password' => sha1($password),
			':age' => $age,
			':email' => $email
		];

		if(executeDML($query, $params))
		{
			header('Location: index.php');
		}
	} 
	return false;
}
?>