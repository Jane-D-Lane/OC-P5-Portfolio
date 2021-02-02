<?php

namespace Eleusis\Portfolio\src\model;

// Représente un sujet du forum
class Topic {

	private $id;
	private $pseudo;
	private $title;
	private $message;
	private $creationDateFr;
	private $lastReply; 
	private $nbMessage;

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

 	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
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

	public function getLastReply() {
		return $this->lastReply;
	}

	public function setLastReply($lastReply) {
		$this->lastReply = $lastReply;
	}

	public function getNbMessage() {
		return $this->nbMessage;
	}
	
	public function setNbMessage($nbMessage) {
		$this->nbMessage = $nbMessage;
	}	
}