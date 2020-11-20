<?php

namespace Eleusis\Portfolio\config;

use Eleusis\Portfolio\src\controller\FrontController;
use Eleusis\Portfolio\src\controller\BackController;
use Eleusis\Portfolio\src\controller\ErrorController;
use Exception;

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

	public function run() {
		$action = $this->request->getGet()["action"];
		try {
			if(isset($action)) {
				if($action == 'home') {
					$this->frontController->homePage();
				} elseif($action == 'posts') {
					$this->frontController->postsPage();
				} elseif($action == 'onePost') {
					if(isset($_GET['id']) && $_GET['id'] > 0) {
						$this->frontController->onePostPage($_GET['id']);
					} else {
						$this->errorController->errorNotFound();
					}
				} elseif($action == 'addPost') {
					$this->backController->addPost($_POST);
				} elseif($action == 'contact') {
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