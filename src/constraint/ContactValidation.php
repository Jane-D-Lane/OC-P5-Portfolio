<?php

namespace Eleusis\Portfolio\src\constraint;

use Eleusis\Portfolio\config\Parameter;

class ContactValidation extends Validation {

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
		if($name === 'name') {
			$error = $this->checkName($name, $value);
			$this->addError($name, $error);
		} elseif($name === 'email') {
			$error = $this->checkEmail($name, $value);
			$this->addError($name, $error);
		} elseif($name === 'messageTitle') {
			$error = $this->checkMessageTitle($name, $value);
			$this->addError($name, $error);
		} elseif($name === 'message') {
			$error = $this->checkMessage($name, $value);
			$this->addError($name, $error);
		}

	}

	private function addError($name, $error) {
		if($error) {
			$this->errors += [$name =>$error];
		}
	} 

	private function checkName($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('name', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('name', $value, 2);
		}
		if($this->constraint->maxLenght($name, $value, 100)) {
			return $this->constraint->maxLenght('name', $value, 100);
		}
	}

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

	private function checkMessageTitle($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('messageTitle', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('messageTitle', $value, 2);
		}
		if($this->constraint->maxLenght($name, $value, 100)) {
			return $this->constraint->maxLenght('messageTitle', $value, 100);
		}
	}

	private function checkMessage($name, $value) {
		if($this->constraint->notBlank($name, $value)) {
			return $this->constraint->notBlank('message', $value);
		}
		if($this->constraint->minLenght($name, $value, 2)) {
			return $this->constraint->minLenght('message', $value, 2);
		}
	}
}