<?php 
define('BASE_DIR', './');
define('PUBLIC_DIR', BASE_DIR.'public/');
define('PROTECTED_DIR', BASE_DIR.'protected/');

define('DATABASE_CONTROLLER', PROTECTED_DIR.'database.php');
define('USER_MANAGER', PROTECTED_DIR.'usermanager.php');
define('CARD_MANAGER', PROTECTED_DIR.'cardmanager.php');
define('PRIZE_MANAGER', PROTECTED_DIR.'prizemanager.php');
define('GAME_MANAGER', PROTECTED_DIR.'gamemanager.php');


define('DB_TYPE','mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'teamx');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');
?>