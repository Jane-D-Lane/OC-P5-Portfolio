<?php

namespace Eleusis\Portfolio\src\controller;

// Gestion de ce qui est accessible aux utilisateurs 
class FrontController extends Controller{

	// Affichage de la page d'accueil du site 
	public function homePage() {
		return $this->view->render('home_view');
	}

	// Affichage de la page des tous les articles 
	public function postsPage() { 
		$posts = $this->postDAO->getPosts();
		return $this->view->render('posts_view',['posts' => $posts]);
	}

	// Affichage d'un article 
	public function onePostPage($postId) {
		$post = $this->postDAO->getPost($postId);
		return $this->view->render('post_view', ['post' => $post]);
	} 

	// Afichage de la page de contact 
	public function formPage() {
		return $this->view->render('contact_view');
	}

}


