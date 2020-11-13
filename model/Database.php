<?php

class Database {

	const DB_HOST = ''mysql:host=localhost;dbname=portfolioEleusis;charset=utf8'';
	const DB_USER = 'root';
	const DB_PASS = 'root';

	protected function getConnection() {
		try {
			$connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
			return $connection;
		} 
		catch(Exception $errorConnection) {
			die('Erreur : ' .$errorConnection->getMessage());
		}
	}
}