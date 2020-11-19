<?php

namespace Eleusis\Portfolio\src\controller;

class ErrorController {

	public function errorNotFound() {
		return $this->view->render('error_404');
	}

	public function errorServer() {
		return $this->view->render('error_500');
	}

}