<?php 
function AddCard($name, $number, $expiration, $security) {
	$query = "SELECT id FROM creditcards WHERE 'number' = ':number'";
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

function DeleteCard($id){

	$query = "DELETE FROM creditcards WHERE 'id' = ':id'";
		$params = [ ':id' => $id ];
		require_once DATABASE_CONTROLLER;

    if(executeDML($query, $params))
		{
			header('Location: index.php?P=profile');
		}
	else echo "A törlendő kártya nem létezik!";
}

function CheckCard($id){
	$query = "SELECT id FROM creditcards WHERE 'userid' = ':id'";
		$params = [ ':id' => $id ];
		require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	return !empty($record);
}

?>