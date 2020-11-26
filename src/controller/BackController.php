<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\config\Parameter;

// Gestion des fonctionnalités de l'espace admin 
class BackController extends Controller {

	// Si un formulaire a été soumis, ajout d'un article avec PostDAO 
	public function addPost(Parameter $Post) {
		if($Post->get('submit')) {
			$this->postDAO->addPost($Post);
			$this->session->set('add_post_view', 'Le nouvel article a bien été ajouté.');
			$posts = $this->postDAO->getPosts(); 
			return $this->view->render('posts_view', ['posts' => $posts]);
		}
		return $this->view->render('add_post_view', ['Post' => $Post]);
	}

	public function editPost(Parameter $Post, $postId) {
		$post = $this->postDAO->getPost($postId);
		if($Post->get('submit')) {
			$this->postDAO->editPost($Post, $postId);
			$this->session->set('edit_post_view', 'L\'article a bien été modifié.');
		}
		return $this->view->render('edit_post_view', ['post' => $post]);
	}

	public function deletePost($postId) {
		$this->postDAO->deletePost($postId);
		$this->session->set('delete_post', 'L\'article a bien été supprimé.');
		$posts = $this->postDAO->getPosts();
		return $this->view->render('posts_view', ['posts' => $posts]);
	}
	
}