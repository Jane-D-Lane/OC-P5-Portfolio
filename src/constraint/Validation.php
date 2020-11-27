<?php

namespace Eleusis\Portfolio\src\constraint;

class Validation {

 	// Valide les données dans $data
	public function validate($data, $name) {
		if($name === 'Post') {
			$postValidation = new PostValidation();
			$errors = $postValidation->check($data);
			return $errors;
		}
	}
}