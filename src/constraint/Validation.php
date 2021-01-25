<?php

namespace Eleusis\Portfolio\src\constraint;

class Validation {

 	// Valide les données pour chaque champ contrôlé, et renvoie les erreurs
	public function validate($data, $name) {
		if($name === 'Post') {
			$postValidation = new PostValidation();
			$errors = $postValidation->check($data);
			return $errors;
		} elseif ($name === 'Comment') {
			$commentValidation = new CommentValidation();
			$errors = $commentValidation->check($data);
			return $errors;
		} elseif ($name === 'User') {
			$userValidation = new UserValidation();
			$errors = $userValidation->check($data);
			return $errors;
		} elseif ($name === 'Contact') {
			$contactValidation = new ContactValidation();
			$errors = $contactValidation->check($data);
			return $errors;
		} elseif ($name === 'Topic') {
			$topicValidation = new TopicValidation();
			$errors = $topicValidation->check($data);
			return $errors;
		} elseif ($name === 'Reply') {
			$replyValidation = new replyValidation();
			$errors = $replyValidation->check($data);
			return $errors;
		}
	}
}