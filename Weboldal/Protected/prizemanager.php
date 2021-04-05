<?php  

function ListPrize(){
	$query = "SELECT * FROM prizes";
	require_once DATABASE_CONTROLLER;
	return getList($query);
}

function RedeemPrize($userid, $prizeid){
	$query = "SELECT price FROM prizes WHERE id = :id";
	$params = [ 'id' => $prizeid ];	
	require_once DATABASE_CONTROLLER;
	$price = getField($query, $params);
	require_once USER_MANAGER;
	SpendXcoin($userid, $price);
} 

?>