<?php

namespace Eleusis\Portfolio\src\constraint;

use Eleusis\Portfolio\config\Parameter;

// Contraintes de validation des commentaires
class CommentValidation extends Validation {

	private $errors = [];
	private $constraint;

	public function __construct() {
		$this->constraint = new Constraint();
	}

	public function check(Parameter $postUrl) {
		foreach($postUrl->all() as $key => $value) {
			$this->checkField($key, $value);
		}
		return $this->errors;
	}

	private function checkField($name, $value) {
		if($name === 'pseudo') {
			$error = $this->checkPseudo($name, $value);
			$this->addError($name, $error);
		} elseif($name === 'comment') {
			$error = $this->checkComment($name, $value);
			$this->addError($name, $error);
		}
	}

	// Ajoute une erreur si une erreur est donnée
	private function addError($name, $error) {
		if($error) {
			$this->errors += [$name =>$error];
		}
	} 


	private function checkPseudo($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('pseudo', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('pseudo', $value, 2);
		}
		if($this->constraint->maxLenght($name, $value, 255)) {
			return $this->constraint->maxLenght('pseudo', $value, 255);
		}
	}

	private function checkComment($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('comment', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('comment', $value, 2);
		}
	}

}