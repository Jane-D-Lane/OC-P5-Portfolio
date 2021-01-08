<?php

namespace Eleusis\Portfolio\src\constraint;

class Validation {

 	// Valide les données dans $data
	public function validate($data, $name) {
		if($name === 'Post') {
			$postValidation = new PostValidation();
			$errors = $postValidation->check($data);
			return $errors;
		} elseif ($name === 'Comment') {
			$commentValidation = new CommentValidation();
			$errors = $commentValidation->check($data);
			return $errors;
		} elseif ($name === 'User') {
			$userValidation = new UserValidation();
			$errors = $userValidation->check($data);
			return $errors;
		} elseif ($name === 'Contact') {
			$contactValidation = new ContactValidation();
			$errors = $contactValidation->check($data);
			return $errors;
		}
	}
}