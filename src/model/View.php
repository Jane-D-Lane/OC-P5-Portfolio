<?php

namespace Eleusis\Portfolio\src\model;

class View {

	private $file;
	private $title;

	public function render($template, $data = []) {
		$this->file = '/Applications/MAMP/htdocs/P5-Portfolio/src/view/'.$template.'.php';
		$content = $this->renderFile($this->file, $data);
		$view = $this->renderFile('/Applications/MAMP/htdocs/P5-Portfolio/src/view/template.php', [
			'title' => $this->title,
			'content' => $content
		]);
		echo $view;
	}

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