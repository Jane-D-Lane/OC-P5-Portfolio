<?php

namespace Eleusis\Portfolio\src\model;

// Représente un commentaire
class Comment {

	private $id;
	private $pseudo;
	private $comment;
	private $commentDate;
	private $flag;

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

	public function getComment() {
		return $this->comment;
	}

	public function setComment($comment) {
		$this->comment = $comment;
	}	

	public function getCommentDate() {
		return $this->commentDate;
	}

	public function setCommentDate($commentDate) {
		$this->commentDate = $commentDate;
	}	

	public function getFlag() {
		return $this->flag;
	}

	public function setFlag($flag) {
		$this->flag = $flag;
	}	
}