<?php 
function AddCard($name, $number, $expiration, $security) {
	$query = "SELECT id FROM  WHERE 'number' = ':number'";
	$params = [ ':name' => $name,
				':number' => $number,
				':expiration' => $expiration,
				':security' => $security ];
	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO creditcards (name, 'number', expiration, security) VALUES (:name, ':number', :expiration, :security)";		

		if(executeDML($query, $params))
		{
			header('Location: index.php?P=profile');
		}
	} 
	return false;
}