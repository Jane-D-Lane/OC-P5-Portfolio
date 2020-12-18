<?php

namespace Eleusis\Portfolio\src\model;

// Représente un article du blog 
class Post {

	private $id;
	private $title;
	private $content;
	private $img;
	private $creationDateFr;

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
	}

	public function getContent() {
		return $this->content;
	}
	public function setContent($content) {
		$this->content = $content;
	}

	public function getImg() {
		return $this->img;
	}
	public function setImg($img) {
		$this->img = $img;
	}

	public function getCreationDate() {
		return $this->creationDateFr;
	}
	public function setCreationDate($creationDateFr) {
		$this->creationDateFr = $creationDateFr;
	}
}