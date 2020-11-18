<?php

require("vendor/autoload.php");

use Eleusis\Portfolio\src\DAO\Post;

?>

<?php $title = "Travaux"; ?>

<?php ob_start(); ?>

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

<?php $content = ob_get_clean(); ?>

<?php require('src/view/template.php'); ?>