<?php $this->title = "Nouvel article"; ?>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('add_post_view'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-6">
			<?php include('post_form.php'); ?>
			<a href="index.php?action=administration">Retour à l'accueil</a>
		</div>
	</div>
</div>