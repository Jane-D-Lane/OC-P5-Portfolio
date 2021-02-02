<?php $this->title = 'Mon profil'; ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<?= $this->session->show('update_password'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h2><?= $this->session->get('pseudo'); ?></h2>
			<p><?= $this->session->get('email'); ?></p>
			<a href="index.php?action=updatePassword">Modifier mon mot de passe</a><br>
			<a href="index.php?action=deleteAccount">Supprimer mon compte</a>
			<br><br>
		</div>
		<div class="col-12">
			<a href="index.php?action=forumHome">Retour au forum</a>
		</div>
	</div>
</div>