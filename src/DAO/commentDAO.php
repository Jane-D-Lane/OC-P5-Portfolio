<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\Comment;
use Eleusis\Portfolio\config\Parameter;

class CommentDAO extends DAO {

	// Converti chaque champ de la table en propriété d'une instance de Comment
	private function buildObject($row) {
		$comment = new Comment();
		$comment->setId($row['id']);
		$comment->setPseudo($row['pseudo']);
		$comment->setComment($row['comment']);
		$comment->setCommentDate($row['commentDateFr']);
		$comment->setFlag($row['flag']);
		return $comment;
	} 

	// Récupère tous les commentaires d'un article
	public function getCommentsFromPost($postId) {
		$sql = 'SELECT id, user_id, pseudo, comment, flag, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS commentDateFr 
				FROM comments 
				WHERE post_id = ? 
				ORDER BY comment_date DESC';
		$result = $this->createQuery($sql, [$postId]);
		$comments = [];
		foreach ($result as $row) {
			$commentId = $row['id'];
			$comments[$commentId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $comments;
	}

	// Ajout d'un commentaire dans la bdd
	public function addComment(Parameter $postUrl, $postId) {
		$sql = 'INSERT INTO comments(user_id, post_id, pseudo, comment, flag, comment_date) 
				VALUES (?, ?, ?, ?, 0, NOW())';
		$this->createQuery($sql, [$_SESSION['id'], $postId, $postUrl->get('pseudo'), $postUrl->get('comment')]);
	}

	// Ajoute un signalement de commentaire
	public function flagComment($commentId) {
		$sql = 'UPDATE comments 
				SET flag=? 
				WHERE id= ?';
		$this->createQuery($sql, [1, $commentId]);
	} 

	// Récupère les commentaires signalés
	public function getFlagComments() {
		$sql = 'SELECT id, pseudo, comment, flag, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS commentDateFr 
				FROM comments 
				WHERE flag = ? 
				ORDER BY comment_date DESC';
		$result = $this->createQuery($sql, [1]);
		$comments = [];
		foreach($result as $row) {
			$commentId = $row['id'];
			$comments[$commentId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $comments;
	}
 
    // Enlève le signalement d'un commentaire
 	public function unflagComment($commentId) {
 		$sql = 'UPDATE comments 
 				SET flag = ? 
 				WHERE id = ?';
 		$this->createQuery($sql, [0, $commentId]);
 	}

 	// Supprime un commentaire
	public function deleteComment($commentId) {
		$sql = 'DELETE FROM comments 
				WHERE id = ?';
		$this->createQuery($sql, [$commentId]);
	}

}