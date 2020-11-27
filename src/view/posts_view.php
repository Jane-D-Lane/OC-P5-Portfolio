<?php

use Eleusis\Portfolio\src\DAO\PostDAO;

?>

<?php $this->title = "Travaux"; ?>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('delete_post'); ?>
			<?= $this->session->show('add_post_view'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-8 px-5">
			<a href="index.php?action=addPost">Nouvel article</a>
		
<?php
foreach($posts as $post) {
?> 

			<div>
				<h3>
					<a href="index.php?action=onePost&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars($post->getTitle()) ?></a>
					<em>le <?= $post->getCreationDate() ?></em>
				</h3> 
				<p><?= nl2br($post->getContent()) ?></p>			
			</div>

<?php
}
?>

		</div>
	</div>
</div>
