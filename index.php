<?php 

require('controller/postController.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'home') {
			homePage();
		} 
	} else {
		homePage();
	}
}
catch(Exception $e) {
	die('Erreur : ' . $e->getMessage());
}