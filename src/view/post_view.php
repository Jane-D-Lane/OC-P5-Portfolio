
<?php $this->title = "Travaux"; ?>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('add_comment'); ?>
			<?= $this->session->show('flag_comment'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-7 px-5 mx-auto">
			<div class="card border-primary text-center">
				<div class="card-header">
					<?= htmlspecialchars($post->getTitle()) ?>
					<em>le <?= $post->getCreationDate() ?></em>
				</div>
				<div class="card-body">	
					<?php
					if($post->getImg()) {
					?>
					<div>
						<img id="onePostImg" class="card-img-top" src="public/uploads/<?= $post->getImg() ?>" alt="image de l'article">
					</div>
					<?php 
					}
					?>
					<p><?= nl2br($post->getContent()) ?></p>
				</div>
			</div>
			<br>
			<?php
			if($this->session->get('role') === 'admin') {
			?>
			<div>
				<a href="index.php?action=editPost&amp;id=<?= $post->getId(); ?>">Modifier</a>
				<a href="index.php?action=deletePost&amp;id=<?= $post->getId(); ?>">Supprimer</a>
			</div>
			<br>
			<div>
				<a href="index.php?action=administration">Retour à l'accueil</a>
			</div><br>
			<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 px-5 text-center">
			
			<div>
    			<h3>Ajouter un commentaire</h3>
    			<?php
				if(isset($_SESSION['pseudo'])) {
				?>
				<form action="index.php?action=addComment&amp;id=<?= $post->getId() ?>" method="post">
    				<label for="pseudo">
        				<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?= $_SESSION['pseudo']; ?>">
    				</label><br>
    				<?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    				<label for="comment">
        				<textarea name="comment" id="comment" cols="30" rows="10" placeholder="Votre commentaire"><?= isset($postUrl) ? htmlspecialchars($postUrl->get('comment')): ''; ?></textarea>
        				<?= isset($errors['comment']) ? $errors['comment'] : ''; ?>
    				</label><br>
    				<input type="submit" value="Envoyer" name="submit" id="submit">
				</form><br>
				<?php
				} else {
				?>
				<div class="card border-danger mx-auto my-4" style='width: 20rem;'>
					<div class="card-title">
						<p>Vous devez être membre pour ajouter un commentaire.</p>
					</div>
					<div class="card-text">
						<p><a href="index.php?action=login">Pour se connecter</a></p>
						<p><a href="index.php?action=register">Pour s'inscrire</a></p>
					</div>
				</div>
				<?php
				}
				?>
			</div>
			<div>
				<h3>Commentaires</h3><br>
				<?php
				if($comments) {
					foreach ($comments as $comment) {
				?>
				<h4>
					<?= htmlspecialchars($comment->getPseudo()) ?>
					<em>le <?= $comment->getCommentDate() ?></em>
				</h4>
				<p><?= htmlspecialchars($comment->getComment()) ?></p>
				<?php
					if($comment->getFlag()) {
				?>
				<p class="flag">Ce commentaire a été signalé.</p>
				<?php
					} else {
				?>
				<p><a href="index.php?action=flagComment&commentId=<?= $comment->getId() ?>">Signaler</a></p>
				<?php
					}
				?>
				<p><a href="index.php?action=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
        		<br>
        		<?php
					}
				} else {
				?>
				<p>Il n'y a pas encore de commentaires. Venez en ajouter !</p><br>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>

