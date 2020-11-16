<?php 

require('config/dev.php');
require('controller/frontController.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'home') {
			homePage();
		} elseif($_GET['action'] == 'contact') {
			formPage();
		} elseif($_GET['action'] == 'work') {
			postsPage();
		} elseif($_GET['action'] == 'oneWork') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				onePostPage();
			} else {
				throw new Exception("Aucun identifiant de billet envoyé.");
			}
		}
	} else {
		homePage();
	}
}
catch(Exception $e) {
	die('Erreur : ' . $e->getMessage());
}