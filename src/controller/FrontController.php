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
		$posts = $this->postDAO->getLimitPosts();
		$pages = $this->postDAO->getPages();
		$currentPage = $this->postDAO->getCurrentPage();
		return $this->view->render('posts_view',[
			'posts' => $posts,
			'pages' => $pages,
			'currentPage' =>$currentPage
		]);
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
				$this->view->render('post_view', [
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
		$topics = $this->topicDAO->getTopics();
		return $this->view->render('forumHome_view', ['topics' => $topics]);
	}

	// Affichage d'un article 
	public function oneTopic($topicId) {
		$topic = $this->topicDAO->getTopic($topicId);
		$replies = $this->replyDAO->getRepliesFromTopic($topicId);
		return $this->view->render('topic_view', [
			'topic' => $topic,
			'replies' => $replies
		]);
	} 

	// Insertion d'un sujet du forum dans la BDD
	public function addTopic(Parameter $postUrl) {
		if($postUrl->get('submit')) {
			$errors = $this->validation->validate($postUrl, 'Topic');
			if(!$errors) {
				$this->topicDAO->addTopic($postUrl);
				$this->session->set('forumHome_view', 'Un nouveau sujet a été posté.');
				header('Location: index.php?action=forumHome');
			} else {
				$this->view->render('add_topic', [
					'topics' => $topics,
					'errors' => $errors,
					'postUrl' => $postUrl
				]);
			}
		} else {
			$this->view->render('add_topic');
		}
	}

	// Ajout d'une réponse à un sujet du forum 
	public function addReply(Parameter $postUrl, $topicId) {
		$topic = $this->topicDAO->getTopic($topicId);
		$replies = $this->replyDAO->getRepliesFromTopic($topicId);

		if($postUrl->get('submit')) {
			$errors = $this->validation->validate($postUrl, 'Reply');
			if(!$errors) {
				$this->replyDAO->addReply($postUrl, $topicId);
				$this->session->set('topic_view', 'Une nouvelle réponse a été postée.');
				header('Location: index.php?action=oneTopic&topicId='.$topicId);
			} else {
				$this->view->render('topic_view', [
					'topics' => $topics,
					'replies' => $replies,
					'errors' => $errors,
					'postUrl' => $postUrl
				]);
			}
		} else {
			$this->view->render('topic_view');
		}
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

	// Envoyer un message à l'admin via le formulaire de contact
	public function sendMail(Parameter $postUrl) {	
		if($postUrl->get('submit')) {
			$errors = $this->validation->validate($postUrl, 'Contact');
			if(!$errors) {
				$this->contact->sendMail($postUrl);
				$this->session->set('send_mail', 'Le message a bien été envoyé.');
				header('Location: index.php?action=sendMail');
			} else {
				return $this->view->render('contact_view', [
					'postUrl' => $postUrl,
					'errors' => $errors
				]);
			}
		} else {
			return $this->view->render('contact_view');
		}
	}

}


