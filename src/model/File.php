<?php

namespace Eleusis\Portfolio\src\model;

class File {

	private $id;
	private $file_name;
	private $link;

	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
	}

	public function getFile_name() {
		return $this->file_name;
	}
	public function setFile_name($file_name) {
		$this->file_name = $file_name;
	}

	public function getLink() {
		return $this->link;
	}
	public function setLink($link) {
		$this->link = $link;
	}
}