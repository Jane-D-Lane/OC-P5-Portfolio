<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\Topic;
use Eleusis\Portfolio\src\model\Reply;
use Eleusis\Portfolio\config\Parameter;
 
 class TopicDAO extends DAO {

 	// Converti chaque champ de la table en propriété d'une instance de Topic
 	private function buildObject($row) {
 		$topic = new Topic();
 		
 		$topic->setId($row['id']);
 		$topic->setPseudo($row['pseudo']);
 		$topic->setTitle($row['title']);
 		$topic->setMessage($row['message']);
 		$topic->setCreationDate($row['creationDateFr']);
 		$topic->setLastReply($row['lastReply']);
 		$topic->setNbMessage($row['nb_message']);
 		return $topic;
 	 	
 	}

    // Récupère tous les sujets
 	public function getTopics() {
 		$sql = 'SELECT topics.id, topics.pseudo, title, topics.message, topics.creation_date AS creationDateFr, DATE_FORMAT(MAX(replies.creation_date), \'%d/%m/%Y à %Hh%i\') AS lastReply, COUNT(replies.topic_id) AS nb_message
 				FROM topics 
 				LEFT JOIN replies ON topics.id = replies.topic_id
 				GROUP BY topics.id
 				ORDER BY topics.creation_date DESC';
 		$result = $this->createQuery($sql);
 		$topics = [];
 		foreach ($result as $row) {
 			$topicId = $row['id'];
 			$topics[$topicId] = $this->buildObject($row);
 		}
 		$result->closeCursor();
		return $topics;
 	}

 	// Récupère un sujet
 	public function getTopic($topicId) {
 		$sql = 'SELECT id, pseudo, title, message, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creationDateFr 
 				FROM topics 
 				WHERE id = ?';
 		$result = $this->createQuery($sql, [$topicId]);
 		$topic = $result->fetch();
 		$result->closeCursor();
 		return $this->buildObject($topic);
 	}

 	// Ajout d'un sujet dans la bdd
 	public function addTopic(Parameter $postUrl) {
 		$sql = 'INSERT INTO topics(user_id, pseudo, title, message, creation_date) 	
 				VALUES (?, ?, ?, ?, NOW())';
 		$this->createQuery($sql, [$_SESSION['id'], $postUrl->get('pseudo'), $postUrl->get('title'), $postUrl->get('message')]);
 	}

 	// Supprime un sujet 
 	public function deleteTopic($topicId) {
 		$sql = 'DELETE FROM topics
				WHERE id = ?';
		$this->createQuery($sql, [$topicId]);
 	}

 }