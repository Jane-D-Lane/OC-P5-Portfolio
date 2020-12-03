<?php

namespace Eleusis\Portfolio\src\model;

class User {

	private $id;
	private $pseudo;
	private $password;
	private $email;
	private $inscriptionDateFr;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getPseudo() {
		return $this->pseudo;
	}

	public function setPseudo($pseudo) {
		$this->pseudo = $pseudo;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getInscriptionDate() {
		return $this->inscriptionDateFr;
	}
	public function setInscriptionDate($inscriptionDateFr) {
		$this->inscriptionDateFr = $inscriptionDateFr;
	}
}