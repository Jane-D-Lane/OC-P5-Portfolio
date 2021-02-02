<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\User;
use Eleusis\Portfolio\config\Parameter;

class userDAO extends DAO {

	// Converti chaque champ de la table en propriété d'une instance de User
	private function buildObject($row) {
		$user = new User();
		$user->setId($row['id']);
		$user->setRole($row['name']);
		$user->setPseudo($row['pseudo']);
		$user->setEmail($row['email']);
		$user->setInscriptionDate($row['inscriptionDate']);
		return $user;
	}

	// Récupère tous les membres inscrits
	public function getUsers() {
		$sql = 'SELECT users.id, users.pseudo, users.email, users.inscriptionDate, role.name 
				FROM users 
				INNER JOIN role ON users.role_id = role.id 
				ORDER BY users.id DESC';
		$result = $this->createQuery($sql);
		$users = [];
		foreach ($result as $row) {
			$userId = $row['id'];
			$users[$userId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $users;
	}

	// Ajout d'un membre dans la bdd
	public function register(Parameter $postUrl) {
		$this->checkUser($postUrl);
		$sql = 'INSERT INTO users(role_id, pseudo, password, email, inscriptionDate) 
				VALUES (?, ?, ?, ?, NOW())';
		$this->createQuery($sql, [2, $postUrl->get('pseudo'), password_hash($postUrl->get('password'), PASSWORD_DEFAULT), $postUrl->get('email')]);
	}

	// Vérifie le pseudo existant d'un membre
	public function checkUser(Parameter $postUrl) {
		$sql = 'SELECT COUNT(pseudo) 
				FROM users 
				WHERE pseudo = ?';
		$result = $this->createQuery($sql, [$postUrl->get('pseudo')]);
		$isUnique = $result->fetchColumn();
		if($isUnique) {
			return '<p style="color: red;">Le pseudo existe déjà.</p>';
		}
	}

	// Récupère les données d'un membre pour le connecter
	public function login(Parameter $postUrl) {
		$sql = 'SELECT users.id, users.role_id, users.password, users.email, role.name 
				FROM users 
				INNER JOIN role ON role.id = users.role_id 
				WHERE pseudo = ?';
		$data = $this->createQuery($sql, [$postUrl->get('pseudo')]);
		$result = $data->fetch();
		$isPasswordValid = password_verify($postUrl->get('password'), $result['password']);
		return [
			'result' => $result,
			'isPasswordValid' => $isPasswordValid
		];
	}

	// Modifie le mot de passe d'un membre
	public function updatePassword(Parameter $postUrl, $pseudo) {
		$sql = 'UPDATE users 
				SET password = ? 
				WHERE pseudo = ?';
		$this->createQuery($sql, [password_hash($postUrl->get('password'), PASSWORD_DEFAULT), $pseudo]);
	}

	// Supprime un membre par lui-même
	public function deleteAccount($pseudo) {
		$sql = 'DELETE FROM users 
				WHERE pseudo = ?';
		$this->createQuery($sql, [$pseudo]);
	}

	// Supprime un membre par l'admin
	public function deleteUser($userId) {
		$sql = 'DELETE FROM users 
				WHERE id = ?';
		$this->createQuery($sql, [$userId]);
	}
}