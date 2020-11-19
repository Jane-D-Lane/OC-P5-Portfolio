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

	public function __construct() {
		$this->frontController = new FrontController();
		$this->backController = new BackController();
		$this->errorController = new ErrorController();
	}

	public function run() {
		try {
			if(isset($_GET['action'])) {
				if($_GET['action'] == 'home') {
					$this->frontController->homePage();
				} elseif($_GET['action'] == 'posts') {
					$this->frontController->postsPage();
				} elseif($_GET['action'] == 'onePost') {
					if(isset($_GET['id']) && $_GET['id'] > 0) {
						$this->frontController->onePostPage();
					} else {
						$this->errorController->errorNotFound();
					}
				} elseif($_GET['action'] == 'addPost') {
					$this->backController->addPost($_POST);
				} elseif($_GET['action'] == 'contact') {
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