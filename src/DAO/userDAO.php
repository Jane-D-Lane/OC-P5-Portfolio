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

	public function login(Parameter $postUrl) {
		$sql = 'SELECT id, password, email FROM users WHERE pseudo = ?';
		$data = $this->createQuery($sql, [$postUrl->get('pseudo')]);
		$result = $data->fetch();
		$isPasswordValid = password_verify($postUrl->get('password'), $result['password']);
		return [
			'result' => $result,
			'isPasswordValid' => $isPasswordValid
		];
	}

	public function updatePassword(Parameter $postUrl, $pseudo) {
		$sql = 'UPDATE users SET password = ? WHERE pseudo = ?';
		$this->createQuery($sql, [password_hash($postUrl->get('password'), PASSWORD_DEFAULT), $pseudo]);
	}
}