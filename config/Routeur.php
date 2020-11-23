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
		var_dump($this->request->getSession()->get('test'));
		if(isset($_GET['action'])) {
			$action = $this->request->getGet()->get('action');
		} else {
			$action = NULL;
		}
		$postId = $this->request->getGet()->get('id');
		$post = $this->request->getPost();
		try {
			if(isset($action)) {
				if($action === 'posts') {
					$this->frontController->postsPage();
				} elseif($action === 'onePost') {
					if(isset($postId) && $postId > 0) {
						$this->frontController->onePostPage($postId);
					} else {
						$this->errorController->errorNotFound();
					}
				} elseif($action === 'addPost') {
					$this->backController->addPost($post);
				} elseif($action === 'contact') {
					$this->frontController->formPage();
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