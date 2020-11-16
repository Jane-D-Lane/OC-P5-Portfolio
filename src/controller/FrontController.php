<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\src\model\Post;

class FrontController {

	private $post;

	public function __construct() {
		$this->post = new Post();
	}

	public function homePage() {
		require('src/view/homeView.php');
	}

	public function postsPage() {
		$posts = $this->post->getPosts();
		require('src/view/postsView.php');
	}

	public function onePostPage() {
		$posts = $this->post->getPost($_GET['id']);
		require('src/view/postView.php');
	} 

	public function formPage() {
		require('src/view/contactView.php');
	}

}

function formPage() {
	
}

