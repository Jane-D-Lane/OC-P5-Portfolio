<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\Topic;
use Eleusis\Portfolio\src\model\Reply;
use Eleusis\Portfolio\config\Parameter;
 
 class TopicDAO extends DAO {

 	private function buildObject($row) {
 		$topic = new Topic();
 		$topic->setId($row['id']);
 		$topic->setPseudo($row['pseudo']);
 		$topic->setTitle($row['title']);
 		$topic->setMessage($row['message']);
 		$topic->setCreationDate($row['creationDateFr']);
 		return $topic;
 	}

 	public function getTopics() {
 		$sql = 'SELECT id, pseudo, title, message, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creationDateFr FROM topics ORDER BY creation_date DESC';
 		$result = $this->createQuery($sql);
 		$topics = [];
 		foreach ($result as $row) {
 			$topicId = $row['id'];
 			$topics[$topicId] = $this->buildObject($row);
 		}
 		$result->closeCursor();
		return $topics;
 	}

 	public function getTopic($topicId) {
 		$sql = 'SELECT id, pseudo, title, message, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creationDateFr FROM topics WHERE id = ?';
 		$result = $this->createQuery($sql, [$topicId]);
 		$topic = $result->fetch();
 		$result->closeCursor();
 		return $this->buildObject($topic);
 	}

 	public function addTopic(Parameter $postUrl) {
 		$sql = 'INSERT INTO topics(user_id, pseudo, title, message, creation_date) VALUES (?, ?, ?, ?, NOW())';
 		$this->createQuery($sql, [$_SESSION['id'], $postUrl->get('pseudo'), $postUrl->get('title'), $postUrl->get('message')]);
 	}

 }