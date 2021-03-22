<?php 
function AddCard($userid, $name, $number, $expiration, $security) {
    $query = "SELECT id FROM creditcards WHERE cardnumber = :cardnumber";
    $params = [':cardnumber' => $number];
    require_once DATABASE_CONTROLLER;
    $record = getRecord($query, $params);
    if(empty($record)) {
        $query = "INSERT INTO creditcards (userid, name, cardnumber, expiration, security_code) VALUES (:userid, :name, :cardnumber, :expiration, :security)";
        $params = [ 
                ':userid' => $userid,
                ':name' => $name,
                ':cardnumber' => $number,
                ':expiration' => $expiration,
                ':security' => $security
                ];
        if(executeDML($query, $params))
        {
            header('Location: index.php?P=listcard');
        }
    } 
    return false;
}

function ListCard($userid){
	$query = "SELECT id, name, cardnumber, expiration FROM creditcards WHERE userid = :userid";
	$params = [':userid' => $userid];
	require_once DATABASE_CONTROLLER;
	return getList($query, $params);
}

function DeleteCard($id){
	$query = "DELETE FROM creditcards WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
    if(executeDML($query, $params))
		{
			header('Location: index.php?P=listcard');
		}
	return false;
}

function CheckCard($id){
	$query = "SELECT id FROM creditcards WHERE userid = :id";
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
		require_once DATABASE_CONTROLLER;

		$balance = getField($query,$params)+$amount;

		$query="SELECT deposit FROM users WHERE id = :id";
		$deposit = getField($query,$params) + $amount;

		$query="UPDATE users SET balance = :balance, deposit = :deposit WHERE id=:id";
		$params = [ ':id' => $id,
					':balance' => $balance,
					':deposit' => $deposit ];
		
		if(executeDML($query, $params))
		{
			header('Location: index.php?P=profile');
		}
	}
	return false;
}

function Withdraw($id, $amount){
	if(CheckCard($id))
	{
		$query="SELECT balance FROM users WHERE id = :id";
		$params = [ ':id' => $id ];
		require_once DATABASE_CONTROLLER;

		$balance = getField($query,$params);

		$query="SELECT withdraw FROM users WHERE id = :id";
		$withdraw = getField($query,$params);

		if($balance >= $amount)
		{
			$balance -= $amount;			
			$withdraw += $amount;
			$query = "UPDATE users SET balance = :balance, withdraw = :withdraw WHERE id = :id";
			$params = [ ':id' => $id,
						':balance' => $balance,
						':withdraw' => $withdraw ];	
			if(executeDML($query, $params))
			{
				header('Location: index.php?P=profile');
			}
		}
	}
	return false;		
}
?>