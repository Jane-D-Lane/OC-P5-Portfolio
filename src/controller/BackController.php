<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\config\Parameter;

// Gestion des fonctionnalités de l'espace admin 
class BackController extends Controller {

	// Si un formulaire a été soumis, ajout d'un article avec PostDAO 
	public function addPost(Parameter $Post) {
		if($Post->get('submit')) {
			$this->postDAO->addPost($Post);
			$this->session->set('addPostView', 'Le nouvel article a bien été ajouté.');
		}
		return $this->view->render('addPostView', ['Post' => $Post]);
	}

	public function editPost(Parameter $Post, $postId) {
		$post = $this->postDAO->getPost($postId);
		if($Post->get('submit')) {
			$this->postDAO->editPost($Post, $postId);
			$this->session->set('editPostView', 'L\'article a bien été modifié.');
		}
		return $this->view->render('editPostView', ['post' => $post]);
	}
	
}