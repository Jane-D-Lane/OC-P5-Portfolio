<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\config\Parameter;

// Gestion de ce qui est accessible aux utilisateurs 
class FrontController extends Controller {

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
		$comments = $this->commentDAO->getCommentsFromPost($postId);
		return $this->view->render('post_view', [
			'post' => $post,
			'comments' => $comments
		]);
	} 

	//Si données d'ajout de commentaire reçues et validées, insertion dans la bdd
	public function addComment(Parameter $postUrl, $postId) {
		$post = $this->postDAO->getPost($postId);
		$comments = $this->commentDAO->getCommentsFromPost($postId);

		if($postUrl->get('submit')) {
			$errors = $this->validation->validate($postUrl, 'Comment');
			if(!$errors) {
				$this->commentDAO->addComment($postUrl, $postId);
				$this->session->set('add_comment', 'Le nouveau commentaire a bien été posté.');
				header('Location: index.php?action=onePost&id='.$postId);
			} else {
				$this->view->render('post_view.php', [
					'post' => $post,
					'comments' => $comments,
					'errors' => $errors,
					'postUrl' => $postUrl
				]);
			}
		} else {
			header('Location: index.php');
		}
	}

	// Signaler un commentaire
	public function flagComment($commentId) {
		$this->commentDAO->flagComment($commentId);
		$this->session->set('flag_comment', 'Le commentaire a été signalé.');
		header('Location: index.php?action=postPage');
	}

	// Affichage de la page principale du forum
	public function forumHome() {
		return $this->view->render('forumHome_view');
	}

	// Gère l'inscription d'un nouveau membre
	public function register(Parameter $postUrl) {
		if($postUrl->get('submit')) {
			$errors = $this->validation->validate($postUrl, 'User');
			if($this->userDAO->checkUser($postUrl)) {
				$errors['pseudo'] = $this->userDAO->checkUser($postUrl);
			}
			if(!$errors) {
				$this->userDAO->register($postUrl);
				$this->session->set('register', 'Votre inscription a bien été effectuée.');
				header('Location: index.php?action=forumHome');
			} else {
				return $this->view->render('register_view', [
					'postUrl' => $postUrl,
					'errors' => $errors
				]);
			}
		}
		return $this->view->render('register_view');
	}

	// Gère la connexion d'un membre
	public function login(Parameter $postUrl) {
		if($postUrl->get('submit')) {
			$result = $this->userDAO->login($postUrl);
			if($result && $result['isPasswordValid']) {
				$this->session->set('login', 'Content de vous revoir');
				$this->session->set('id', $result['result']['id']);
				$this->session->set('role', $result['result']['name']);
				$this->session->set('pseudo', $postUrl->get('pseudo'));
				$this->session->set('email', $result['result']['email']);
				header('Location: index.php?action=forumHome');
			} else {
				$this->session->set('error_login', 'Le pseudo et/ou le mot de passe sont incorrects.');
				return $this->view->render('login_view', ['postUrl' => $postUrl]);
			}
		}
		return $this->view->render('login_view');
	}

	// Affichage de la page de contact 
	public function formPage() {
		return $this->view->render('contact_view');
	}

}


