<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\Post;
use Eleusis\Portfolio\config\Parameter;

// Gestion des opérations effectuées sur les articles, effectue les requêtes directement 
class PostDAO extends DAO {
	
	// Converti chaque champ de la table en propriété d'une instance de Post 
	private function buildObject($row) {
		$post = new Post();
		$post->setId($row['id']);
		$post->setTitle($row['title']);
		$post->setContent($row['content']);
		$post->setImg($row['img']);
		$post->setCreationDate($row['creationDateFr']);
		return $post;
	}

	// Renvoie le résultat de la requête de tous les articles 
	public function getPosts() {
		$sql = 'SELECT id, title, content, img, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr FROM posts ORDER BY id DESC';
		$result = $this->createQuery($sql);	
		$posts = [];
		foreach ($result as $row) {
			$postId = $row['id'];
			$posts[$postId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $posts;
	}

	// Récupération d'un article suivant son id 
	public function getPost($postId) {
		$sql = 'SELECT id, title, content, img, DATE_FORMAT(creationDate, \'%d/%m/%Y\') AS creationDateFr FROM posts WHERE id = ?';
		$result = $this->createQuery($sql, [$postId]);
		$post = $result->fetch();
		$result->closeCursor();
		return $this->buildObject($post);
	}

	// Ajout d'un article dans la base de données 
	public function addPost(Parameter $postUrl) {
		$dataFile = pathinfo($_FILES['img']['name']);
		$extendUpload = $dataFile['extension'];
		$extendIsValid = array('jpg', 'jpeg', 'gif', 'png');
		if(in_array($extendUpload, $extendIsValid)) {
			move_uploaded_file($_FILES['img']['tmp_name'], 'public/uploads/' .basename($_FILES['img']['name']));
		};

		$sql = 'INSERT INTO posts (title, content, img, creationDate) VALUES (?, ?, ?, NOW())';
		$this->createQuery($sql, [$postUrl->get('title'), $postUrl->get('content'), $_FILES['img']['name']]);
	}

	// Modification d'un article dans la base de données
	public function editPost(Parameter $postUrl, $postId) {
		$sql = 'UPDATE posts SET title=:title, content=:content WHERE id=:postId';
		$this->createQuery($sql, [
			'title' => $postUrl->get('title'),
			'content' => $postUrl->get('content'),
			'postId' => $postId
		]);
	}

	// Suppression d'un article dans la base de données
	public function deletePost($postId) {
		$sql = 'DELETE FROM posts WHERE id = ?';
		$this->createQuery($sql, [$postId]);
	}
}