<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\config\Parameter;

class userDAO extends DAO {

	public function register(Parameter $postUrl) {
		$this->checkUser($postUrl);
		$sql = 'INSERT INTO users(pseudo, password, email, inscriptionDate) VALUES (?, ?, ?, NOW())';
		$this->createQuery($sql, [$postUrl->get('pseudo'), password_hash($postUrl->get('password'), PASSWORD_DEFAULT), $postUrl->get('email')]);
	}

	public function checkUser(Parameter $postUrl) {
		$sql = 'SELECT COUNT(pseudo) FROM users WHERE pseudo = ?';
		$result = $this->createQuery($sql, [$postUrl->get('pseudo')]);
		$isUnique = $result->fetchColumn();
		if($isUnique) {
			return '<p style="color: red;">Le pseudo existe déjà.</p>';
		}
	}
}