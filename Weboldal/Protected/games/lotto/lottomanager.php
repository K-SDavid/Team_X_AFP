<?php 
function AddLotto($userid, $first, $second, $third, $fourth, $fifth){
	$query = "INSERT INTO lotto(userid, first, second, third, fourth, fifth) VALUES (:userid, :first, :second, :third, :fourth, :fifth)";
	$params = [
		':userid' => $userid,
		':first' => $first,
		':second' => $second,
		':third' => $third,
		':fourth' => $fourth,
		':fifth' => $fifth
	];
	require_once DATABASE_CONTROLLER;
	if(executeDML($query, $params))
    {
        Bet($_SESSION['uid'], 5);
        header('Location: index.php?P=lotto');
    }
    return false;
}

function ListLotto() {
	$query = "SELECT * FROM lotto";
	require_once DATABASE_CONTROLLER;
	return getList($query);
}
?>