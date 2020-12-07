<?php

namespace Eleusis\Portfolio\config;

// Gestion de la session utilisateur
class Session {

	private $session;

	public function __construct($session) {
		$this->session = $session;
	}

	// Création ou mise à jour d'une valeur de session
	public function set($name, $value) {
		$_SESSION[$name] = $value;
	}

	// Retourne la valeur associée à la clé
	public function get($name) {
		if(isset($_SESSION[$name])) {
			return $_SESSION[$name];
		}
	}

	// Retourne la valeur associée à la clé et la supprime de la session
	public function show($name) {
		if(isset($_SESSION[$name])) {
			$key = $this->get($name);
			$this->remove($name);
			return $key;
		}
	}

	// Supprime la propriété dans les données de SESSION
	public function remove($name) {
		unset($_SESSION[$name]);
	}

	// Ouvre une session
	public function start() {
		session_start();
	}

	// Supprime la session ouverte
	public function stop() {
		session_destroy();
	}
}
