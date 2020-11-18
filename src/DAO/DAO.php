<?php

namespace Eleusis\Portfolio\src\DAO;

use PDO;
use Exception;

abstract class DAO {

 	private function getConnection() {
		try {
			$connection = new \PDO(DB_HOST, DB_USER, DB_PASS);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connection;
		} catch(Exception $errorConnection) {
			die('Erreur de connection : ' .$errorConnection->getMessage());
		}
	}

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