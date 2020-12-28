<?php

namespace Eleusis\Portfolio\src\model;

class File {

	public function getFile() {
		$dataFile = pathinfo($_FILES['img']['name']);
		$extendUpload = $dataFile['extension'];
		$extendIsValid = array('jpg', 'jpeg', 'gif', 'png');
		if(in_array($extendUpload, $extendIsValid)) {
			move_uploaded_file($_FILES['img']['tmp_name'], 'public/uploads/' .basename($_FILES['img']['name']));
		};
	}

}