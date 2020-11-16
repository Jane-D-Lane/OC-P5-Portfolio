<?php

namespace Eleusis\Portfolio\model;

require("model/Database.php");

class Post extends Database
{
	public function getPosts() {
		$sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY id DESC';
		return $this->createQuery($sql);
	}

	public function getPost($postId) {
		$sql = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?';
		return $this->createQuery($sql, [$postId]);
	}
}