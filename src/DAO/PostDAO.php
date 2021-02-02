<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\File;
use Eleusis\Portfolio\src\model\Post;
use Eleusis\Portfolio\config\Parameter;
use Eleusis\Portfolio\config\Request;
use PDO;

// Gestion des opérations effectuées sur les articles, effectue les requêtes directement 
class PostDAO extends DAO {

	private $pages;
	private $currentPage;
	private $request;
	private $page;

	public function __construct() {
		$this->request = new Request();
		$this->page = $this->request->getGet()->get('page');
	}
	
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
		$sql = 'SELECT id, title, content, img, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDateFr 
				FROM posts 
				ORDER BY creation_date DESC';
		$result = $this->createQuery($sql);	
		$posts = [];
		foreach ($result as $row) {
			$postId = $row['id'];
			$posts[$postId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $posts;
	}

	// Récupération d'un nombre d'articles par page
	public function getLimitPosts() {
		if(isset($this->page) && !empty($this->page)) {
			$this->currentPage = strip_tags($this->page);
		} else {
			$this->currentPage = 1;
		};

		$sql = 'SELECT COUNT(*) AS nb_posts 
				FROM posts';
		$result = $this->createQuery($sql);
		$posts = $result->fetch();
		$postNb = $posts['nb_posts'];

		$byPage = 6;
		$this->pages = ceil($postNb/$byPage);
		$first = ($this->currentPage * $byPage) - $byPage;

		$sql = 'SELECT id, title, content, img, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDateFr 
				FROM posts 
				ORDER BY id DESC 
				LIMIT :first, :byPage';
		$result = $this->getConnection()->prepare($sql);
		$result->bindParam(':first', $first, PDO::PARAM_INT);
		$result->bindParam(':byPage', $byPage, PDO::PARAM_INT);
		$result->execute();

		$posts = [];
		foreach ($result as $row) {
			$postId = $row['id'];
			$posts[$postId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $posts;
	}

	// Récupération du nombre de pages d'articles
	public function getPages() {
		return $this->pages;
	}

	// Récupération de la page actuelle
	public function getCurrentPage() {
		return $this->currentPage;
	}

	// Récupération d'un article suivant son id 
	public function getPost($postId) {
		$sql = 'SELECT id, title, content, img, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDateFr 
				FROM posts 
				WHERE id = ?';
		$result = $this->createQuery($sql, [$postId]);
		$post = $result->fetch();
		$result->closeCursor();
		return $this->buildObject($post);
	}

	// Ajout d'un article dans la base de données 
	public function addPost(Parameter $postUrl) {
		if($postUrl->get('file')) {
			$file = new File();
			$file->getFile();
		}
		$sql = 'INSERT INTO posts (title, content, img, creation_date) 
				VALUES (?, ?, ?, NOW())';
		$this->createQuery($sql, [$postUrl->get('title'), $postUrl->get('content'), $_FILES['img']['name']]);
	}

	// Modification d'un article dans la base de données
	public function editPost(Parameter $postUrl, $postId) {
		if($postUrl->get('file')) {
			$file = new File();
			$file->getFile();
		}
		$sql = 'UPDATE posts 
				SET title=:title, content=:content 
				WHERE id=:postId';
		$this->createQuery($sql, [
			'title' => $postUrl->get('title'),
			'content' => $postUrl->get('content'),
			'postId' => $postId
		]);
	}

	// Suppression d'un article dans la base de données
	public function deletePost($postId) {
		$sql = 'DELETE FROM posts 
				WHERE id = ?';
		$this->createQuery($sql, [$postId]);
	}
}