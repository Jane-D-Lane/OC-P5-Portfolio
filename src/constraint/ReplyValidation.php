<?php
 
namespace Eleusis\Portfolio\src\constraint;

use Eleusis\Portfolio\config\Parameter;

class ReplyValidation extends Validation {

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
		if($name === 'message') {
			$error = $this->checkMessage($name, $value);
			$this->addError($name, $error);
		}
	}

	// Validation du champs d'une réponse à un sujet
	private function checkMessage($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('message', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('message', $value, 2);
		}
	}

}