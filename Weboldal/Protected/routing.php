<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {
	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;

	case 'register': require_once PROTECTED_DIR.'user/register.php'; break;

	case 'logout': UserLogout(); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}
?>