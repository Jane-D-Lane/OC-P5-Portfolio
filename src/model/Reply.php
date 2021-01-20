<?php

namespace Eleusis\Portfolio\src\model;

class Reply {

	private $id;
	private $pseudo;
	private $message;
	private $creationDateFr;

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
	
	public function getMessage() {
		return $this->message;
	}
	
	public function setMessage($message) {
		$this->message = $message;
	}	

	public function getCreationDate() {
		return $this->creationDateFr;
	}
	public function setCreationDate($creationDateFr) {
		$this->creationDateFr = $creationDateFr;
	}
}