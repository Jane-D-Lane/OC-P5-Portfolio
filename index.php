<?php 

require('controller/frontController.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'home') {
			homePage();
		} elseif($_GET['action'] == 'contact') {
			formPage();
		} elseif($_GET['action'] == 'work') {
			contentPage();
		}
	} else {
		homePage();
	}
}
catch(Exception $e) {
	die('Erreur : ' . $e->getMessage());
}