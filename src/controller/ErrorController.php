<?php

namespace Eleusis\Portfolio\src\controller;

class ErrorController {

	public function errorNotFound() {
		require("src/view/error_404.php");
	}

	public function errorServer() {
		require("src/view/error_500.php");
	}

}