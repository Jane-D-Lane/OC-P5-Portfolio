<?php

namespace Eleusis\Portfolio\src\controller;

use Eleusis\Portfolio\src\DAO\PostDAO;
use Eleusis\Portfolio\src\model\View;

abstract class Controller {

	protected $postDAO;
	protected $view;

	public function __construct() {
		$this->postDAO = new PostDAO;
		$this->view = new View();
	}

}