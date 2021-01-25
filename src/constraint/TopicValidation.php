<?php
 
namespace Eleusis\Portfolio\src\constraint;

use Eleusis\Portfolio\config\Parameter;

class TopicValidation extends Validation {

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

	// Ajoute une erreur si une erreur est donnée
	private function addError($name, $error) {
		if($error) {
			$this->errors += [$name =>$error];
		}
	} 

	// Appel à la validation de chaque champ, ajoute une erreur si rencontrée
	private function checkField($name, $value) {
		if($name === 'title') {
			$error = $this->checkTitle($name, $value);
			$this->addError($name, $error);
		} elseif($name === 'message') {
			$error = $this->checkMessage($name, $value);
			$this->addError($name, $error);
		}
	}

	// Validation du titre d'un sujet
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

	// Validation du champs d'un sujet
	private function checkMessage($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('message', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('message', $value, 2);
		}
	}

}