<?php
 
namespace Eleusis\Portfolio\src\constraint;

use Eleusis\Portfolio\config\Parameter;

class PostValidation extends Validation {

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
	public function checkField($name, $value) {
		if($name === 'title') {
			$error = $this->checkTitle($name, $value);
			$this->addError($name, $error);
		} elseif ($name === 'content') {
			$error = $this->checkContent($name, $value);
			$this->addError($name, $error);
		}
	}

	// Ajoute une erreur si une erreur est donnée
	private function addError($name, $error) {
		if($error) {
			$this->errors += [$name =>$error];
		}
	} 

	// Validation d'un titre si non nul, min 2, max 255
	private function checkTitle($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('title', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('title', $value, 2);
		}
		if($this->constraint->maxLenght($name, $value, 255)) {
			return $this->constraint->maxLenght('title', $value, 255);
		}
	}

	// Validation d'un contenu si non nul, min 2
	private function checkContent($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('content', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('content', $value, 2);
		}
	}
}