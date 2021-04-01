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

function UserList() {
	$query = "SELECT * FROM users";
	require_once DATABASE_CONTROLLER;
	return getList($query);
}

function ModifyUser($id, $balance, $xcoin) {
	$query = "UPDATE users SET balance = :balance, xcoin = :xcoin WHERE id = :id";
	$params = [
		':id' => $id,
		':balance' => $balance,
		':xcoin' => $xcoin
	];
	require_once DATABASE_CONTROLLER;
	if(executeDML($query, $params))
		{
			header('Location: index.php?P=userlist');
		}
	return false;
}

function DeleteUser($id) {
	$query = "DELETE FROM users WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
    if(executeDML($query, $params))
		{
			header('Location: index.php?P=userlist');
		}
	return false;
}

function SearchUser($search) {
	$query = "SELECT * FROM users WHERE username LIKE '%".$search."%'";
	require_once DATABASE_CONTROLLER;
	return getList($query);
}

function GetBalanceById($id) {
	$query = "SELECT balance FROM users WHERE id = :id";
	$params = [':id' => $id];
	require_once DATABASE_CONTROLLER;
	return getField($query, $params);
}

function GetXCoinById($id) {
	$query = "SELECT xcoin FROM users WHERE id = :id";
	$params = [':id' => $id];
	require_once DATABASE_CONTROLLER;
	return getField($query, $params);
}

function CheckDeposit($id)
{
	$query = "SELECT deposit FROM users WHERE id = :id";
	$params = [	':id' => $id ]; 

	require_once DATABASE_CONTROLLER;
	$deposit = getField($query, $params);
	return $deposit >=10;
}

function UpdateBalance($id){
	$query="SELECT balance FROM users WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
	$_SESSION['balance'] = getField($query, $params);
	
	$query="SELECT xcoin FROM users WHERE id = :id";
	$params = [ ':id' => $id ];
	$_SESSION['xcoin'] = getField($query, $params);
}

function AddXcoin($id, $amount){
	$percent = floor($amount * 0.1);
	$query="SELECT xcoin FROM users WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
	$xcoin = getField($query, $params) + $percent;
	$query="UPDATE users SET xcoin = :xcoin WHERE id = :id";
	$params = [ ':id' => $id ,
				':xcoin' => $xcoin];
	executeDML($query,$params);
	UpdateBalance($id);
}

function SpendXcoin($id, $amount){
	$query="SELECT xcoin FROM users WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
	$xcoin = getField($query, $params) - $amount;	
	$query="UPDATE users SET xcoin = :xcoin WHERE id = :id";
	$params = [ ':id' => $id ,
				':xcoin' => $xcoin];
	executeDML($query,$params);
	UpdateBalance($id);
}

?>