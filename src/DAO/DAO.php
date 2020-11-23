<?php

namespace Eleusis\Portfolio\src\DAO;

use PDO;
use Exception;

// Gestion de la connexion à la base de données
abstract class DAO {

	// Connexion à la base de données, données de configurations contenues dans le fichier dev.php 
 	private function getConnection() {
		try {
			$connection = new \PDO(DB_HOST, DB_USER, DB_PASS);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connection;
		} catch(Exception $errorConnection) {
			die('Erreur de connection : ' .$errorConnection->getMessage());
		}
	}

	// Création d'une requête et exécution sur la base de données, requête préparée si il y a des paramètres 
	protected function createQuery($sql, $parameters = null) {
		if($parameters) {
			$result = $this->getConnection()->prepare($sql);
			$result->execute($parameters);
			return $result;
		} else {
			$result = $this->getConnection()->query($sql);
			return $result;
		}
	}
	
}