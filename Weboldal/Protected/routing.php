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


	case 'lotto': require_once PROTECTED_DIR.'games/lotto/lotto.php'; break;

	case 'addlotto': require_once PROTECTED_DIR.'games/lotto/addlotto.php'; break;

	case 'listlotto': require_once PROTECTED_DIR.'games/lotto/listlotto.php'; break;

	case 'lottoroll': require_once PROTECTED_DIR.'games/lotto/lottoroll.php'; break;


	case 'putto': require_once PROTECTED_DIR.'games/putto/putto.php'; break;

	case 'puttorules': require_once PROTECTED_DIR.'games/putto/puttorule.php'; break;


	case 'wheel': require_once PROTECTED_DIR.'games/wheel/wheel.php'; break;
	case 'wheelrules': require_once PROTECTED_DIR.'games/wheel/wheelrule.php'; break;


	case 'scraper': require_once PROTECTED_DIR.'games/scraper/scrapers.php'; break;

	case 'simplescraper': require_once PROTECTED_DIR.'games/scraper/simplescraper.php'; break;
	
	case 'blackjackscraper': require_once PROTECTED_DIR.'games/scraper/blackjackscraper.php'; break;


	case 'dice': require_once PROTECTED_DIR.'games/dice/dice.php'; break;

	case 'dicerules': require_once PROTECTED_DIR.'games/dice/dicerule.php'; break;

	case 'wheel': require_once PROTECTED_DIR.'games/wheel/wheel.php'; break;
	case 'wheelrules': require_once PROTECTED_DIR.'games/wheel/wheelrules.php'; break;



	case 'logout': UserLogout(); break;


	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}
?>
