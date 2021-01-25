<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\config\Parameter;

class FileDAO extends DAO {

	private function getFile() {
		$dataFile = pathinfo($_FILES['myfile']['name']);
		$extendUpload = $dataFile['extension'];
		$extendIsValid = array('jpg', 'jpeg', 'gif', 'png');
		if(in_array($extendUpload, $extendIsValid)) {
			move_uploaded_file($_FILES['myfile']['tmp_name'], 'public/uploads/' .basename($_FILES['myfile']['name']));
		};
	}
	
}