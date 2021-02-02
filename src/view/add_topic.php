<?php $this->title = "Nouveau sujet"; ?>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('add_topic'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 text-center">
			<form action="index.php?action=addTopic" method="post">
    			<label for="pseudo">
        			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?= $_SESSION['pseudo']; ?>">
    			</label><br>
    			<?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    			<label for="title">
    				<input type="text" name="title" id='title' placeholder="title">
    			</label><br>
    			<label for="message">
        			<textarea name="message" id="message" cols="30" rows="10" placeholder="Votre message"><?= isset($postUrl) ? htmlspecialchars($postUrl->get('message')): ''; ?></textarea>
        			<?= isset($errors['message']) ? $errors['message'] : ''; ?>
    			</label><br>
    			<input type="submit" value="Envoyer" name="submit" id="submit">
				</form><br>
			<a href="index.php?action=forumHome">Retour au forum</a>
		</div>
	</div>
</div>