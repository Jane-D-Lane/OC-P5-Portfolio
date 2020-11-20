<?php

namespace Eleusis\Portfolio\src\controller;

class FrontController extends Controller{

	public function homePage() {
		return $this->view->render('homeView');
	}

	public function postsPage() { 
		$posts = $this->postDAO->getPosts();
		return $this->view->render('postsView',['posts' => $posts]);
	}

	public function onePostPage($postId) {
		$post = $this->postDAO->getPost($postId);
		return $this->view->render('postView', ['post' => $post]);
	} 

	public function formPage() {
		return $this->view->render('contactView');
	}

}


