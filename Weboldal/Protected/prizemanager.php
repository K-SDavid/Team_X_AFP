<?php  
function AddPrize($name, $price) {
	$query = "INSERT INTO prizes(name, price) VALUES (:name, :price)";
	$params = [ 
		':name' => $name,
		':price' => $price
	];
	require_once DATABASE_CONTROLLER;
	if(executeDML($query, $params))
        {
            header('Location: index.php?P=prizes');
        }
    return false;
}

function ModifyPrize($id, $name, $price) {
	$query = "UPDATE prizes SET name = :name, price = :price WHERE id = :id";
	$params = [
		':id' => $id,
		':name' => $name,
		':price' => $price
	];
	require_once DATABASE_CONTROLLER;
	if(executeDML($query, $params))
	{
		header('Location: index.php?P=prizes');
	}
	return false;
}

function DeletePrize($id) {
	$query = "DELETE FROM prizes WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
    if(executeDML($query, $params))
		{
			header('Location: index.php?P=prizes');
		}
	return false;
}

function GetPrizeById($id) {
	$query = "SELECT name, price FROM prizes WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
	return getRecord($query, $params);
}

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