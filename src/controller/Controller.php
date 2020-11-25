<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\src\DAO\PostDAO;
use Eleusis\Portfolio\src\model\View;
use Eleusis\Portfolio\config\Request;
use Eleusis\Portfolio\config\Parameter;
use Eleusis\Portfolio\config\Session;

// Généralisation de l'usage des contrôleurs 
abstract class Controller {

	protected $postDAO;
	protected $view;
	private $request;
	protected $get;
	protected $Post;
	protected $session;

	public function __construct() {
		$this->postDAO = new PostDAO;
		$this->view = new View();
		$this->request = new Request();
		$this->get = $this->request->getGet();
		$this->Post = $this->request->getPost();
		$this->session = $this->request->getSession();
	}

}