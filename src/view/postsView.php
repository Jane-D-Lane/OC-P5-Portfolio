<?php

use Eleusis\Portfolio\src\DAO\PostDAO;

?>

<?php $this->title = "Travaux"; ?>



<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 px-5">
		
<?php
foreach($posts as $post) {
?> 

			<div>
				<h3>
					<a href="index.php?action=oneWork&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars($post->getTitle()) ?></a>
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

