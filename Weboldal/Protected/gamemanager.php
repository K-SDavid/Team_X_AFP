<?php 
function GetMaxBetAmount($name)
{
	require_once DATABASE_CONTROLLER;
	$query="SELECT max FROM games WHERE name =:name";
	$params =[ ':name' => $name];
	return getField($query,$params);
}

function GetMinBetAmount($name)
{
	require_once DATABASE_CONTROLLER;
	$query="SELECT min FROM games WHERE name =:name";
	$params =[ ':name' => $name];
	return getField($query,$params);
}
?>