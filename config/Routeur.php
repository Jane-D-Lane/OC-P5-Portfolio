<?php

namespace Eleusis\Portfolio\config;

use Eleusis\Portfolio\src\controller\FrontController;
use Eleusis\Portfolio\src\controller\BackController;
use Eleusis\Portfolio\src\controller\ErrorController;
use Exception;

// Gestion des routes pour accéder aux vues
class Routeur {

	private $frontController;
	private $backController;
	private $errorController;
	private $request;

	public function __construct() {		
		$this->request = new Request();
		$this->frontController = new FrontController();
		$this->backController = new BackController();
		$this->errorController = new ErrorController();
	}

	// Redirection vers la page demandé
	public function run() {
		$this->request->getSession()->set('test','value');
		if(isset($_GET['action'])) {
			$action = $this->request->getGet()->get('action');
		} else {
			$action = NULL;
		}
		$postId = $this->request->getGet()->get('id');
		$commentId = $this->request->getGet()->get('commentId');
		$userId = $this->request->getGet()->get('userId');
		$postUrl = $this->request->getPost();
		try {
			if(isset($action)) {
				if($action === 'posts') {
					$this->frontController->postsPage();
				} elseif($action === 'onePost') {
					$this->frontController->onePostPage($postId);
				} elseif($action === 'addComment') {
					$this->frontController->addComment($postUrl, $postId);
				} elseif($action === 'flagComment') {
					$this->backController->flagComment($commentId);
				} elseif($action === 'deleteComment') {
					$this->backController->deleteComment($commentId);
				} elseif ($action === 'administration') {
					$this->backController->administration();
				} elseif($action === 'addPost') {
					$this->backController->addPost($postUrl);
				} elseif($action === 'editPost') {
					$this->backController->editPost($postUrl, $postId);
				} elseif($action === 'deletePost') {
					$this->backController->deletePost($postId);
				} elseif($action === 'unflagComment') {
					$this->backController->unflagComment($commentId);
				} elseif($action === 'forumHome') {
					$this->frontController->forumHome();
				} elseif ($action === 'register') {
					$this->frontController->register($postUrl);
				} elseif ($action === 'login') {
					$this->frontController->login($postUrl);	
				} elseif ($action === 'profile') {
					$this->backController->profile();	
				} elseif ($action === 'updatePassword') {
					$this->backController->updatePassword($postUrl);
				} elseif ($action === 'logout') {
					$this->backController->logout();
				} elseif ($action === 'deleteAccount') {
				    $this->backController->deleteAccount();
				} elseif ($action === 'deleteUser') {
					$this->backController->deleteUser($userId);
				} elseif($action === 'sendMail') {
					$this->frontController->sendMail($postUrl);
				} else {
					$this->errorController->errorNotFound();
				}
			} else {
				$this->frontController->homePage();
			}
		} catch(Exception $e) {
			$this->errorController->errorServer();
		}
	}

}