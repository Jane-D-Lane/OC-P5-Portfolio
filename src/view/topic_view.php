<?php $this->title = "Sujet"; ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card border-info">
  				<div class="card-body">
    				<h4 class="card-title"><?= htmlspecialchars($topic->getTitle()) ?></h4>
    				<h6 class="card-subtitle mb-2 text-muted">Par <?= $topic->getPseudo() ?> <em>le <?= $topic->getCreationDate() ?></em></h6>
    				<p class="card-text"><?= nl2br($topic->getMessage()) ?></p>
  				</div>
			</div>
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
    				<h6 class="card-subtitle mb-2 text-muted">Par <?= $reply->getPseudo() ?> <em>le <?= $reply->getCreationDate() ?></em></h6>
    				<p class="card-text"><?= nl2br($reply->getMessage()) ?></p>
  				</div>
			</div>
        	<?php
			}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 px-5 pt-5">
    		<h3>Répondre</h3>
			<form action="index.php?action=addReply&amp;topicId=<?= $topic->getId() ?>" method="post">
    			<label for="pseudo">
        			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?= $_SESSION['pseudo']; ?>">
    			</label><br>
    			<?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    			<label for="message">
        			<textarea name="message" id="mesage" cols="30" rows="10" placeholder="Votre réponse"><?= isset($postUrl) ? htmlspecialchars($postUrl->get('message')): ''; ?></textarea>
        			<?= isset($errors['message']) ? $errors['message'] : ''; ?>
    			</label><br>
    			<input type="submit" value="Répondre" name="submit" id="submit">
			</form><br>
		</div>
	</div>
</div>