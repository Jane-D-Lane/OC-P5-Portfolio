<?php $this->title = "Connexion"; ?>

<div class="container">
	<div class="text-center">
		<?= $this->session->show('error_login'); ?>
		<?= $this->session->show('need_login'); ?>
		<form method="post" action="index.php?action=login">
			<div class="form-group">
				<label for="pseudo">Pseudo</label><br>
				<input type="text" name="pseudo" id="pseudo">
			</div>
			
			<div class="form-group">
				<label for="password">Mot de passe</label><br>
				<input type="password" name="password" id="password">
			</div>
			
			<input type="submit" class="btn btn-info" name="submit" id="submit" value="Se connecter">
		</form>
		<a href="index.php?action=forumHome">Retour au forum</a>
	</div>
</div>