<?php

namespace Eleusis\Portfolio\src\model;

use Eleusis\Portfolio\config\Parameter;

class File {

	// Récupère un fichier posté et l'envoie dans un dossier du site
	private function getFile() {
		$dataFile = pathinfo($_FILES['myfile']['name']);
		$extendUpload = $dataFile['extension'];
		$extendIsValid = array('jpg', 'jpeg', 'gif', 'png');
		if(in_array($extendUpload, $extendIsValid)) {
			move_uploaded_file($_FILES['myfile']['tmp_name'], 'public/uploads/' .basename($_FILES['myfile']['name']));
		};
	}
	
}