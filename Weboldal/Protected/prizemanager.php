<?php  

function ListPrize(){
	$query = "SELECT * FROM prizes";
	require_once DATABASE_CONTROLLER;
	return getList($query);
}

?>