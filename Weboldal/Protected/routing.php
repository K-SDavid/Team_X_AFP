<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {
	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;

	case 'denied': require_once PROTECTED_DIR.'normal/denied.php'; break;


	case 'register': require_once PROTECTED_DIR.'user/register.php'; break;

	case 'profile': require_once PROTECTED_DIR.'user/profile.php'; break;

	case 'deposit': require_once PROTECTED_DIR.'user/deposit.php'; break;

	case 'withdraw': require_once PROTECTED_DIR.'user/withdraw.php'; break;

	case 'prizes': require_once PROTECTED_DIR.'user/prizes.php'; break;
	

	case 'userlist': require_once PROTECTED_DIR.'admin/userlist.php'; break;


	case 'addcard': require_once PROTECTED_DIR.'creditcard/addcard.php'; break;

	case 'listcard': require_once PROTECTED_DIR.'creditcard/listcard.php'; break;


	case 'logout': UserLogout(); break;
	

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}
?>