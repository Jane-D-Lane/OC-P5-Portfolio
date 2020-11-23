<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portofolio\config\Parameter;

// Gestion des fonctionnalités de l'espace admin 
class BackController extends Controller {

	// Si un formulaire a été soumis, ajout d'un article avec PostDAO 
	public function addPost(Parameter $post) {
		if($post->get('submit')) {
			$this->postDAO->addPost($post);
			$this->session->set('addPostView', 'Le nouvel article a bien été ajouté.');
			header('Location: index.php');
		}
		return $this->view->render('addPostView', ['post' => $post]);
	}
	
}