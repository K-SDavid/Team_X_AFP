<?php require_once 'protected/config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Team-X</title>

	<link rel="stylesheet" type="text/css" href="<?=PUBLIC_DIR.'style.css?'?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<header><?php include_once PROTECTED_DIR.'header.php'?></header>
	<nav><?php require_once PROTECTED_DIR.'nav.php'?></nav>
	<content><?php require_once PROTECTED_DIR.'routing.php'?></content>
	<footer><?php include_once PROTECTED_DIR.'footer.php'?></footer>
</body>
</html>