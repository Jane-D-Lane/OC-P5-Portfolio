<?php

namespace Eleusis\Portfolio\src\constraint;

use Eleusis\Portfolio\config\Parameter;

class UserValidation extends Validation {

	private $errors = [];
	private $constraint;

	public function __construct() {
		$this->constraint = new Constraint();
	}

	// Vérifie les données contenues dans POST en fonction des contraintes
	public function check(Parameter $postUrl) {
		foreach ($postUrl->all() as $key => $value) {
			$this->checkField($key, $value);
		}
		return $this->errors;
	}

	// Appel à la validation des titres, ajoute une erreur si rencontrée
	private function checkField($name, $value) {
		if($name === 'pseudo') {
			$error = $this->checkPseudo($name, $value);
			$this->addError($name, $error);
		} elseif ($name === 'password') {
			$error = $this->checkPassword($name, $value);
			$this->addError($name, $error);
		} elseif ($name === 'email') {
			$error = $this->checkEmail($name, $value);
			$this->addError($name, $error);
		}
	}

	// Ajoute une erreur si une erreur est donnée
	private function addError($name, $error) {
		if($error) {
			$this->errors += [$name =>$error];
		}
	} 

	// Validation du pseudo
	private function checkPseudo($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('pseudo', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('pseudo', $value, 2);
		}
		if($this->constraint->maxLenght($name, $value, 100)) {
			return $this->constraint->maxLenght('pseudo', $value, 100);
		}
	}

	// Validation du password 
	private function checkPassword($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('password', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('password', $value, 2);
		}
		if($this->constraint->maxLenght($name, $value, 255)) {
			return $this->constraint->maxLenght('password', $value, 255);
		}
	}

	// Validation de l'email 
	private function checkEmail($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('email', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('email', $value, 2);
		}
		if($this->constraint->maxLenght($name, $value, 100)) {
			return $this->constraint->maxLenght('email', $value, 100);
		}
	}
}