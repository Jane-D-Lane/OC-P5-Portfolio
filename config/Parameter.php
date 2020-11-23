<?php

namespace Eleusis\Portfolio\config;

// Utilisation objet de GET et POST
class Parameter {

	private $parameter;

	public function __construct($parameter) {
		$this->parameter = $parameter;
	}

	// Retourne la valeur d'un paramètre s'il existe
	public function get($name) {
		if(isset($this->parameter[$name])) {
			return $this->parameter[$name];
		}
	}

	// Ajout ou mise à jour d'un paramètre 
	public function set($name, $value) {
		$this->parameter[$name] = $value;
	}
}