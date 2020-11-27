<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\config\Parameter;

// Gestion des fonctionnalités de l'espace admin 
class BackController extends Controller {

	// Si un formulaire a été soumis, ajout d'un article avec PostDAO 
	public function addPost(Parameter $postUrl) {
		if($postUrl->get('submit')) {
			$errors = $this->validation->validate($postUrl, 'Post');
			if(!$errors) {
				$this->postDAO->addPost($postUrl);
				$this->session->set('add_post_view', 'Le nouvel article a bien été ajouté.');
				$posts = $this->postDAO->getPosts(); 
				return $this->view->render('posts_view', ['posts' => $posts]);
			} else {
				return $this->view->render('add_post_view', [
					'postUrl' => $postUrl,
					'errors' => $errors
				]);
			}
		}
		return $this->view->render('add_post_view');
	}

	// Si un formulaire a été soumis, modification d'un article avec PostDAO
	public function editPost(Parameter $postUrl, $postId) {
		$post = $this->postDAO->getPost($postId);
		if($postUrl->get('submit')) {
			$errors = $this->validation->validate($postUrl, 'Post');
			if(!$errors) {
				$this->postDAO->editPost($postUrl, $postId);
				$this->session->set('edit_post_view', 'L\'article a bien été modifié.');
				return $this->view->render('post_view', ['post' => $post]);
			} else {
				return $this->view->render('edit_post_view', [
					'post' => $post,
					'errors' => $errors
				]);
			}
		}
		$postUrl->set('id', $post->getId());
		$postUrl->set('title', $post->getTitle());
		$postUrl->set('content', $post->getContent());

		return $this->view->render('edit_post_view', ['post' => $post]);
	}

	// Suppression d'un article avec PostDAO
	public function deletePost($postId) {
		$this->postDAO->deletePost($postId);
		$this->session->set('delete_post', 'L\'article a bien été supprimé.');
		$posts = $this->postDAO->getPosts();
		return $this->view->render('posts_view', ['posts' => $posts]);
	}
	
}