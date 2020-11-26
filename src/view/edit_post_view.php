<?php $this->title = "Modifier l'article"; ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<?= $this->session->show('edit_post_view'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-6">
			<?php include('post_form.php'); ?>
			<a href="index.php?action=posts">Retour à l'accueil</a>
		</div>
	</div>
</div>