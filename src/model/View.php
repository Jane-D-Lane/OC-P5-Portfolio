<?php

namespace Eleusis\Portfolio\src\model;

class View {

	private $file;
	private $title;

	public function render($template, $data = []) {
		$this->file = '/src/view/'.$template.'.php';
		$content = $this->renderFile($this->file, $data);
		$view = $this->renderFile('/src/view/template.php', [
			'title' => $this->title,
			'content' => $content
		]);
		echo $view;
	}

	public function renderFile($file, $data) {
		var_dump($file);
		die;
		if(file_exists($file)) {
			extract($data);
			ob_start();
			require $file;
			return ob_get_clean();
		} else {
			header('Location: src/view/error_404.php');
		}
	}
}