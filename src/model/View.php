<?php

namespace Eleusis\Portfolio\src\model;

use Eleusis\Portfolio\config\Request;

// Gestion des vues 
class View {

	private $file;
	private $title;
	private $request;
	private $session;

	public function __construct() {
		$this->request = new Request;
		$this->session = $this->request->getSession();
	}

	// Création de la vue associée à la page demandée, en passant par le template 
	public function render($template, $data = []) {
		$this->file = '/Applications/MAMP/htdocs/P5-Portfolio/src/view/'.$template.'.php';
		$content = $this->renderFile($this->file, $data);
		$view = $this->renderFile('/Applications/MAMP/htdocs/P5-Portfolio/src/view/template.php', [
			'title' => $this->title,
			'content' => $content,
			'session' => $this->session
		]);
		echo $view;
	}

	// Rendu d'une page avec ses données 
	public function renderFile($file, $data) {
		if(file_exists($file)) {
			extract($data);
			ob_start();
			require $file;
			return ob_get_clean();
		} else {
			header('Location : src/model/error_404.php');
		}
	}
}