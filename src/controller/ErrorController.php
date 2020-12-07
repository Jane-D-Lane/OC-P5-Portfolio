<?php

namespace Eleusis\Portfolio\src\controller;

// Gestion des erreurs 
class ErrorController extends Controller {

	public function errorNotFound() {
		return $this->view->render('error_404');
	}

	public function errorServer() {
		return $this->view->render('error_500');
	}

}