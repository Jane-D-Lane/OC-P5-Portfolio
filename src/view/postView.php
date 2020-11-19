<?phps

use Eleusis\Portfolio\src\DAO\PostDAO;

?>

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
		</div>
	</div>
</div>

