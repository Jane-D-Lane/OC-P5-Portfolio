<?php

namespace Eleusis\Portfolio\src\DAO;

use Eleusis\Portfolio\src\model\Comment;
use Eleusis\Portfolio\config\Parameter;

class CommentDAO extends DAO {

	private function buildObject($row) {
		$comment = new Comment();
		$comment->setId($row['id']);
		$comment->setPseudo($row['pseudo']);
		$comment->setComment($row['comment']);
		$comment->setCommentDate($row['commentDateFr']);
		$comment->setFlag($row['flag']);
		return $comment;
	} 

	public function getCommentsFromPost($postId) {
		$sql = 'SELECT id, user_id, pseudo, comment, flag, DATE_FORMAT(date_comment, \'%d/%m/%Y\') AS commentDateFr FROM comments WHERE post_id = ? ORDER BY date_comment DESC';
		$result = $this->createQuery($sql, [$postId]);
		$comments = [];
		foreach ($result as $row) {
			$commentId = $row['id'];
			$comments[$commentId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $comments;
	}

	public function addComment(Parameter $postUrl, $postId) {
		$sql = 'INSERT INTO comments(user_id, post_id, pseudo, comment, flag, date_comment) VALUES (?, ?, ?, ?, 0, NOW())';
		$this->createQuery($sql, [$_SESSION['id'], $postId, $postUrl->get('pseudo'), $postUrl->get('comment')]);
	}

	public function flagComment($commentId) {
		$sql = 'UPDATE comments SET flag=? WHERE id= ?';
		$this->createQuery($sql, [1, $commentId]);
	} 

	public function getFlagComments() {
		$sql = 'SELECT id, pseudo, comment, flag, DATE_FORMAT(date_comment, \'%d/%m/%Y\') AS commentDateFr FROM comments WHERE flag = ? ORDER BY date_comment DESC';
		$result = $this->createQuery($sql, [1]);
		$comments = [];
		foreach($result as $row) {
			$commentId = $row['id'];
			$comments[$commentId] = $this->buildObject($row);
		}
		$result->closeCursor();
		return $comments;
	}
 
 	public function unflagComment($commentId) {
 		$sql = 'UPDATE comments SET flag = ? WHERE id = ?';
 		$this->createQuery($sql, [0, $commentId]);
 	}

	public function deleteComment($commentId) {
		$sql = 'DELETE FROM comments WHERE id = ?';
		$this->createQuery($sql, [$commentId]);
	}

}