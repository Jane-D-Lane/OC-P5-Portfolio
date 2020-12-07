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
			<a href="index.php?action=updatePassword">Modifier son mot de passe</a>
		</div>
		<div class="col-12">
			<a href="index.php?action=forumHome">Retour au forum</a>
		</div>
	</div>
</div>