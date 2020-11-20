<?php

namespace Eleusis\Portfolio\config;

class Parameter {

	private $parameter;

	public function __contruct($parameter) {
		var_dump($parameter);
		$this->parameter = $parameter;
	}

	public function get($name) {
		if(isset($this->parameter[$name])) {
			return $this->parameter[$name];
		}
	}

	public function set($name, $value) {
		$this->parameter[$name] = $value;
	}
}