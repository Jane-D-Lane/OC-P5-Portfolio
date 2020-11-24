<?php $this->title = "Modifier l'article"; ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<?= $this->session->show('editPostView'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-6">
			<form method="post" action="index.php?action=editPost&amp;id=<?= $post->getId(); ?>">
				<label for="title">Titre</label><br>
				<input type="text" name="title" id="title" value="<?= htmlspecialchars($post->getTitle()); ?>"><br>
				<label for="content">Contenu</label><br>
				<textarea rows="10" cols="100" id="content" name="content" value="<?= htmlspecialchars($post->getContent()); ?>"></textarea><br>
				<input type="submit" value="Mettre à jour" name="submit" id="submit">
			</form>
			<a href="index.php">Retour à l'accueil</a>
		</div>
	</div>
</div>