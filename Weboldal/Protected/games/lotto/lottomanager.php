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

function DeleteLotto($id) {
	$query = "DELETE FROM lotto WHERE id = :id";
	$params = [ ':id' => $id ];
	require_once DATABASE_CONTROLLER;
	if(executeDML($query, $params))
	{
		header('Location: index.php?P=listlotto');
	}
	return false;
}

function LottoRoll() {
	$temp = range(1, 90);
    shuffle($temp);
    return array_slice($temp, 0, 5);
}

function CountLotto($s = [], $c) {
	$list = ListLotto();
	$temp = 0;
	foreach ($list as $l) {
		array_shift($l);
		array_shift($l);
		$result = array_intersect($l, $s);
		if(count($result) == $c) {
			$temp++;
		}
	}
	return $temp;
}

function Reward($s = [], $hit1, $hit2, $hit3, $hit4, $hit5) {
	$list = ListLotto();
	$userid = 0;
	foreach ($list as $l) {
		$userid = $l['userid'];
		array_shift($l);
		array_shift($l);
		$result = array_intersect($l, $s);
		if(count($result) == 1) {
			Win($userid, $hit1);
		} else if (count($result) == 2) {
			Win($userid, $hit2);
		} else if (count($result) == 3) {
			Win($userid, $hit3);
		} else if (count($result) == 4) {
			Win($userid, $hit4);
		} else if (count($result) == 5) {
			Win($userid, $hit5);
		}
	}
	UpdateBalance($_SESSION['uid']);
	DeleteAllLotto();
}

function DeleteAllLotto() {
	$query = "TRUNCATE TABLE lotto";
	require_once DATABASE_CONTROLLER;
	executeDML($query);
}
?>