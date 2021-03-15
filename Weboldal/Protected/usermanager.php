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

function UserLogin($username, $password) {
	$query = "SELECT id, username, password, age, email, permission, balance, xcoin FROM users WHERE username = :username AND password = :password";
	$params = [
		':username' => $username,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$_SESSION['uid'] = $record['id'];
		$_SESSION['username'] = $record['username'];
		$_SESSION['age'] = $record['age'];
		$_SESSION['email'] = $record['email'];
		$_SESSION['permission'] = $record['permission'];
		$_SESSION['balance'] = $record['balance'];
		$_SESSION['xcoin'] = $record['xcoin'];
		header('Location: index.php?P=home');
	}
	return false;
}

function CheckLogin() {
	return $_SESSION  != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout() {
	session_unset();
	session_destroy();
	header('Location: index.php');
}
?>