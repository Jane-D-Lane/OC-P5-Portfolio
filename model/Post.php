<?php

class Post {
	public function getPosts() {
		$db = $this->getConnection();
		$connection = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\' FROM posts ORDER BY creation_date DESC');
		return $connection;
	}
}