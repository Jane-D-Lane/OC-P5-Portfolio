<?php

namespace Eleusis\Portfolio\src\controller;

class BackController extends Controller {

	public function addPost($post) {
		if(isset($post['submit'])) {
			$postDAO = new PostDAO();
			$postDAO->addPost($post);
			header('Location: index.php');
		}
		return $this->view->render('addPostView', ['post' => $post]);
	}
	
}