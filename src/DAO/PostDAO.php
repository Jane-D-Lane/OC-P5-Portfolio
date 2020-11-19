<?php

namespace Eleusis\Portfolio\src\DAO;
use Eleusis\Portfolio\src\model\Post;

require("src/DAO/DAO.php");

class PostDAO extends DAO {
	
	private function buildObject($row) {
		$post = new Post();
		$post->setId($row['id']);
		$post->setTitle($row['title']);
		$post->setContent($row['content']);
		$post->setCreationDate($row['creationDateFr']);
		return $post;
	}

	public function getPosts() {
		$sql = 'SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr FROM posts ORDER BY id DESC';
		$result = $this->createQuery($sql);	
		$posts = [];
		foreach ($result as $row) {
			$postId = $row['id'];
			$posts[$postId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $posts;
	}

	public function getPost($postId) {
		$sql = 'SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr FROM posts WHERE id = ?';
		$result = $this->createQuery($sql, [$postId]);
		$post = $result->fetch();
		$result->closeCursor();
		return $this->buildObject($post);
	}

	public function addPost($post) {
		extract($post);
		$sql = 'INSERT INTO posts (title, content, creationDate) VALUES (?, ?, NOW())';
		$this->createQuery($sql, [$title, $content]);
	}

}