<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\src\DAO\PostDAO;
use Eleusis\Portfolio\src\DAO\userDAO;
use Eleusis\Portfolio\src\model\View;
use Eleusis\Portfolio\src\constraint\Validation;
use Eleusis\Portfolio\config\Request;
use Eleusis\Portfolio\config\Parameter;
use Eleusis\Portfolio\config\Session;

// Généralisation de l'usage des contrôleurs 
abstract class Controller {

	protected $postDAO;
	protected $userDAO;
	protected $view;
	protected $validation;
	private $request;
	protected $get;
	protected $Post;
	protected $session;

	public function __construct() {
		$this->postDAO = new PostDAO;
		$this->userDAO = new userDAO;
		$this->view = new View();
		$this->validation = new Validation();
		$this->request = new Request();
		$this->get = $this->request->getGet();
		$this->Post = $this->request->getPost();
		$this->session = $this->request->getSession();
	}

}