<?php 
function AddCard($userid,$name, $number, $expiration, $security) {
	$query = "SELECT id FROM creditcards WHERE 'number' = ':number'";
	$params = [ ':name' => $name,
				':number' => $number,
				':expiration' => $expiration,
				':security' => $security,
				':userid' => $userid];
	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO creditcards (userid, name, 'number', expiration, security) VALUES (:userid, :name, ':number', :expiration, :security)";		

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

function Deposit($id, $amount){
	if(CheckCard($id))
	{
		$query="SELECT balance FROM users WHERE id = :id";
		$params = [ ':id' => $id ];
		$balance = getField($query,$params)+$amount;

		$query="UPDATE users SET balance = :balance WHERE id=:id"
		$params = [ ':id' => $id,
					':balance' => $balance ];
		require_once DATABASE_CONTROLLER;
		if(executeDML($query, $params)){
			echo "Sikeres feltöltés!";
		}
		else echo "Sikertelen feltöltés!";
	}
	else echo "Nincs bankkártya csatolva a fiókhoz!";
}


?>