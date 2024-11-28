<?php
session_start();
define('WEBROOT', str_replace('index.php', "", $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', "", $_SERVER['SCRIPT_FILENAME']));
date_default_timezone_set('Africa/Bujumbura');

include 'Ctrl/Admin.php';
// var_dump($lang);die();
if (isset($_GET['p'])) {
	$params = explode('/', $_GET['p']);
	//die(print_r($params));
	$_SESSION['action'] = '';
	$action = $params[0];
	$d = preg_split("#[-]+#", $action);
	// var_dump($d);die();
	$n = count($d);
	if ($n > 1) {
		$action = $d[0];
	}

	if ($_GET['p'] == 'login') {
		Login();
	}

	//url pour le dashboard
	else if ($_GET['p'] == 'logout') {
		Logout();
	} //url pour le dashboard
	else if ($_GET['p'] == 'dashboard') {
		Dashboard();
	} else if ($_GET['p'] == 'users') {
		Users();
	} else if ($_GET['p'] == 'auteurs') {
		Auteurs();
	} else if ($_GET['p'] == 'plans') {
		Plans();
	} else if ($_GET['p'] == 'publishers') {
		Publishers();
	} else if ($_GET['p'] == 'blanguage') {
		BLanguage();
	} else if ($_GET['p'] == 'facultes') {
		Facultes();
	} else if ($_GET['p'] == 'departements') {
		Departements();
	} else if ($_GET['p'] == 'classes') {
		Classes();
	} else if ($_GET['p'] == 'genres') {
		Genres();
	} else if ($_GET['p'] == 'souscription') {
		Subscription();
	} else if ($_GET['p'] == 'membres') {
		Members();
	} else if ($_GET['p'] == 'verification') {
		Verify();
	} else if ($_GET['p'] == 'livres') {
		Books();
	} else if ($_GET['p'] == 'etudiants') {
		Etudiants();
	} else if ($_GET['p'] == 'register') {
		Register();
	} else if ($_GET['p'] == 'plan') {
		Plan();
	} else if ($_GET['p'] == 'detailL') {
		DetailL();
	} else if ($_GET['p'] == 'circulations') {
		Circulations();
	} else if ($_GET['p'] == 'view') {
		View();
	} else if ($_GET['p'] == 'viewbook') {
		ViewBook();
	} else if ($_GET['p'] == 'emprunts') {
		Borrow();
	}else if ($_GET['p'] == 'returned') {
		Returned();
	}else if ($_GET['p'] == 'addqty') {
		AddQty();
	}else if ($_GET['p'] == 'return') {
		Returned();
	}else if ($_GET['p'] == 'rmember') {
		RMembers();
	}else if ($_GET['p'] == 'rdoc') {
		RDocs();
	}else if ($_GET['p'] == 'log') {
		Logs();
	}else if ($_GET['p'] == 'ret') {
		RReturn();
	}else if ($_GET['p'] == 'emp') {
		REmprunts();
	}
	else if ($_GET['p'] == 'detailA') {
		DetailA();
	}
	//pour la page non trouvee
	else {
		error404();
	}
} else {
	Login();
}
