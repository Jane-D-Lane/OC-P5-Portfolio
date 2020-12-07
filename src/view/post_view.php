
<?php $this->title = "Travaux"; ?>

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 px-5">
			<div>
				<h3>
					<?= htmlspecialchars($post->getTitle()) ?>
					<em>le <?= $post->getCreationDate() ?></em>
				</h3> 
				<p><?= nl2br($post->getContent()) ?></p>			
			</div>
			<br>
			<?php
			if($this->session->get('role') === 'admin') {
			?>
			<div>
				<a href="index.php?action=editPost&amp;id=<?= $post->getId(); ?>">Modifier</a>
				<a href="index.php?action=deletePost&amp;id=<?= $post->getId(); ?>">Supprimer</a>
			</div>
			<br>
			<div>
				<a href="index.php?action=administration">Retour à l'accueil</a>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>

