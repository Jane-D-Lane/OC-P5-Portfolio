<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\config\Parameter;

// Gestion des fonctionnalités de l'espace admin 
class BackController extends Controller {

	public function checkLoggedIn() {
		if(!$this->session->get('pseudo')) {
			$this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page.');
			header('Location: index.php?action=login');
		} else {
			return true;
		} 
	}

	public function checkAdmin() {
		if(!($this->session->get('role') === 'admin')) {
			$this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page.');
			header('Location: index.php');
		} else {
			return true;
		} 
	}

	// Connexion à l'espace administration
	public function administration() {
		if($this->checkAdmin()) {
			$posts = $this->postDAO->getPosts();
			$flagComments = $this->commentDAO->getFlagComments();
			$users = $this->userDAO->getUsers();
			$this->view->render('admin_view', [
				'posts' => $posts,
				'comments' => $flagComments,
				'users' => $users
			]);
		}
	}


	// Si un formulaire a été soumis, ajout d'un article avec PostDAO 
	public function addPost(Parameter $postUrl) {
		if($this->checkAdmin()) {
			if($postUrl->get('submit')) {
				$errors = $this->validation->validate($postUrl, 'Post');
				if(!$errors) {
					$this->postDAO->addPost($postUrl);
					$this->session->set('add_post_view', 'Le nouvel article a bien été ajouté.');
					header('Location: index.php?action=administration');
				} else {
					return $this->view->render('add_post_view', [
						'postUrl' => $postUrl,
						'errors' => $errors
					]);
				}
			}
			return $this->view->render('add_post_view');
		}
	}

	// Si un formulaire a été soumis, modification d'un article avec PostDAO
	public function editPost(Parameter $postUrl, $postId) {
		if($this->checkAdmin()) {
			$post = $this->postDAO->getPost($postId);
			if($postUrl->get('submit')) {
				$errors = $this->validation->validate($postUrl, 'Post');
				if(!$errors) {
					$this->postDAO->editPost($postUrl, $postId);
					$this->session->set('edit_post_view', 'L\'article a bien été modifié.');
					header('Location: index.php?action=administration');
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
	}

	// Suppression d'un article avec PostDAO
	public function deletePost($postId) {
		if($this->checkAdmin()) {
			$this->postDAO->deletePost($postId);
			$this->session->set('delete_post', 'L\'article a bien été supprimé.');
			header('Location: index.php?action=administration');
		}
	}

	// Suppression d'un commentaire avec CommentDAO
	public function deleteComment($commentId) {
		$this->commentDAO->deleteComment($commentId);
		$this->session->set('delete_comment', 'Le commentaire a bien été supprimé.');
		header('Location: index.php?action=administration');
	}

	// Retire le flag d'un commentaire
	public function unflagComment($commentId) {
		if($this->checkAdmin()) {
			$this->commentDAO->unflagComment($commentId);
			header('Location: index.php?action=administration');
		}
	}

	// Afficher la page de profil d'un membre
	public function profile() {
		if($this->checkLoggedIn()) {
			return $this->view->render('profile_view');
		}
	}

	//Modifier le mot de passe d'un membre
	public function updatePassword(Parameter $postUrl) {
		if($this->checkLoggedIn()) {
			if($postUrl->get('submit')) {
				$this->userDAO->updatePassword($postUrl, $this->session->get('pseudo'));
				$this->session->set('update_password', 'Le mot de passe a été mis à jour.');
				header('Location: index.php?action=profile');
			}
			return $this->view->render('updatePassword_view');
		}
	}

	// Deconnexion de la session ouverte
	public function logout() {
		if($this->checkLoggedIn()) {
			$this->session->stop();
			$this->session->start();
			$this->session->set('logout', 'A bientôt !');
			header('Location: index.php?action=forumHome');
		}
	}

	// Supprimer un membre par lui-même
	public function deleteAccount() {
		if($this->checkLoggedIn()) {
			$this->userDAO->deleteAccount($this->session->get('pseudo'));
			$this->session->stop();
			$this->session->start();
			$this->session->set('delete_account', 'Votre compte a bien été supprimé.');
			header('Location: index.php?action=forumHome');
		}
	}

	// Supprimer un membre par l'admin
	public function deleteUser($userId) {
		if($this->checkAdmin()) {
			$this->userDAO->deleteUser($userId);
			$this->session->set('delete_user', 'L\'utilisateur a bien été supprimé.');
			header('Location: index.php?action=administration');
		}
	}
}