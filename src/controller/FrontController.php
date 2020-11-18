<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\src\DAO\PostDAO;
use Eleusis\Portfolio\src\model\View;

class FrontController {

	private $postDAO;
	private $view;

	public function __construct() {
		$this->postDAO = new PostDAO();
		$this->view = new View();
	}

	public function homePage() {
		require('src/view/homeView.php');
	}

	public function postsPage() { 
		$posts = $this->postDAO->getPosts();
		return $this->view->render('postsView',['posts' => $posts]);
	}

	public function onePostPage() {
		$post = $this->postDAO->getPost($_GET['id']);
		require('src/view/postView.php');
	} 

	public function formPage() {
		require('src/view/contactView.php');
	}

}


