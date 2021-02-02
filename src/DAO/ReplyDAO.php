<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\Topic;
use Eleusis\Portfolio\src\model\Reply;
use Eleusis\Portfolio\config\Parameter;
 
 class ReplyDAO extends DAO {

 	// Converti chaque champ de la table en propriété d'une instance de Reply
 	private function buildObject($row) {
 		$reply = new Reply();
 		$reply->setId($row['id']);
 		$reply->setPseudo($row['pseudo']);
 		$reply->setMessage($row['message']);
 		$reply->setCreationDate($row['creationDateFr']);
 		return $reply;
 	}

 	// Récupère toutes les réponses d'un sujet
 	public function getRepliesFromTopic($topicId) {
 		$sql = 'SELECT id, user_id, pseudo, message, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creationDateFr 
 				FROM replies 
 				WHERE topic_id = ? 
 				ORDER BY creation_date';
 		$result = $this->createQuery($sql, [$topicId]);
 		$replies = [];
 		foreach ($result as $row) {
 			$replyId = $row['id'];
 			$replies[$replyId] = $this->buildObject($row);
 		}
 		$result->closeCursor();
 		return $replies;
 	}

 	// Récupère la date et l'heure de la dernière réponse postée
 	public function getLastReply() {
 		$sql = 'SELECT id, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creationDateFr 
 				FROM replies 
 				ORDER BY creation_date DESC 
 				LIMIT 1';
 		$result = $this->createQuery($sql);
 		$replies = $result->fetch();
 		return $replies;
 	}

 	// Ajout d'une réponse dans la bdd
 	public function addReply(Parameter $postUrl, $topicId) {
 		$sql = 'INSERT INTO replies(user_id, topic_id, pseudo, message, creation_date) 
 				VALUES (?, ?, ?, ?, NOW())';
 		$this->createQuery($sql, [$_SESSION['id'], $topicId, $postUrl->get('pseudo'), $postUrl->get('message')]);
 	}

 	// Vide le contenu d'une réponse d'un sujet (modération admin)
 	public function deleteReply($replyId) {
 		$sql = 'UPDATE replies
 				SET message="" 
 				WHERE id = ?';
 		$this->createQuery($sql, [$replyId]);
 	}

 }