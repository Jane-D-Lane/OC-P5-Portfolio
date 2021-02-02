<?php $this->title = "Sujet"; ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card border-info">
  				<div class="card-body">
    				<h4 class="card-title"><?= htmlspecialchars($topic->getTitle()) ?></h4>
    				<h6 class="card-subtitle mb-2 text-muted">Par <span class="pseudoMess"> <?= $topic->getPseudo() ?></span> <em>le <?= $topic->getCreationDate() ?></em></h6>
    				<p class="card-text"><?= nl2br($topic->getMessage()) ?></p>
  				</div>
			</div>
			<?php
			if($this->session->get('role') === 'admin') {
			?>
			<div class="text-right">
				<a href="index.php?action=deleteTopic&amp;topicId=<?= $topic->getId(); ?>">Supprimer le sujet</a>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 px-5 pt-5">
			<h3>Réponses</h3>
			<?php
			foreach ($replies as $reply) {
			?>
				<div class="card mt-2">
  				<div class="card-body">
    				<h6 class="card-subtitle mb-2 text-muted">Par <span class="pseudoMess"> <?= $reply->getPseudo() ?></span> <em>le <?= $reply->getCreationDate() ?></em></h6>
    				<?php
    				if($reply->getMessage() == '') {
    					echo '<p class="card-text" style="font-style:italic; color:grey;">Le message a été supprimé par l\'administrateur.</p>';
    				} else {
    					echo '<p class="card-text">' .$reply->getMessage(). '</p>';
    				}
    				?>
  				</div>
			</div>
				<?php
				if($this->session->get('role') === 'admin') {
				?>
				<div class="text-right">
					<a href="index.php?action=deleteReply&amp;topicId=<?= $topic->getId(); ?>&amp;replyId=<?= $reply->getId(); ?>">Supprimer la réponse</a>
				</div>
				<?php
				}
				?>
        	<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 px-5 pt-5 text-center">
    		<h3>Répondre</h3>
    		<?php
			if(isset($_SESSION['pseudo'])) {
			?>
			<form action="index.php?action=addReply&amp;topicId=<?= $topic->getId() ?>" method="post">
    			<label for="pseudo">
        			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?= $_SESSION['pseudo']; ?>">
    			</label><br>
    			<?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    			<label for="message">
        			<textarea name="message" id="message" cols="30" rows="10" placeholder="Votre réponse"><?= isset($postUrl) ? htmlspecialchars($postUrl->get('message')): ''; ?></textarea>
        			<?= isset($errors['message']) ? $errors['message'] : ''; ?>
    			</label><br>
    			<input type="submit" value="Répondre" name="submit" id="submit">
			</form><br>
			<?php
				} else {
				?>
				<div class="card border-danger mx-auto my-4 text-center" style='width: 20rem;'>
					<div class="card-title">
						<p>Vous devez être membre pour répondre au sujet.</p>
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
	</div>
</div>