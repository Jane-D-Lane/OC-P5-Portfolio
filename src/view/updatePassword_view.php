<?php $this->title = "Modifier son mot de passe"; ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié.</p>
			<form method="post" action="index.php?action=updatePassword">
				<label for="password">Mot de passe</label><br>
				<input type="password" id="password" name="password"><br>
				<input type="submit" value="Mettre à jour" id="submit" name="submit">
			</form>
		</div>
	</div>
	<div class="row">
		<a href="index.php?action=profile">Retour au profil</a>
	</div>
</div>