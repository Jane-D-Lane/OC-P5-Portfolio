<?php

namespace Eleusis\Portfolio\config;

use Eleusis\Portfolio\src\controller\FrontController;
use Eleusis\Portfolio\src\controller\ErrorController;
use Eleusis\Portfolio\src\DAO\PostDAO;
use Exception;

class Routeur {

	private $frontController;
	private $errorController;

	public function __construct() {
		$this->frontController = new FrontController();
		$this->errorController = new ErrorController();
	}

	public function run() {
		try {
			if(isset($_GET['action'])) {
				if($_GET['action'] == 'home') {
					$this->frontController->homePage();
				} elseif($_GET['action'] == 'contact') {
					$this->frontController->formPage();
				} elseif($_GET['action'] == 'work') {
					$this->frontController->postsPage();
				} elseif($_GET['action'] == 'oneWork') {
					if(isset($_GET['id']) && $_GET['id'] > 0) {
						$this->frontController->onePostPage();
					} else {
						$this->errorController->errorNotFound();
					}
				}
			} else {
				$this->frontController->homePage();
			}
		} catch(Exception $e) {
			$this->errorController->errorServer();
		}
	}

}