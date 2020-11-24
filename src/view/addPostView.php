<?php $this->title = "Nouvel article"; ?>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('addPostView'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-6">
			<form method="post" action="index.php?action=addPost">
				<label for="title">Titre</label><br>
				<input type="text" name="title" id="title"><br>
				<label for="content">Contenu</label><br>
				<textarea rows="10" cols="100" id="content" name="content"></textarea><br>
				<input type="submit" value="Envoyer" name="submit" id="submit">
			</form>
			<a href="index.php">Retour à l'accueil</a>
		</div>
	</div>
</div>