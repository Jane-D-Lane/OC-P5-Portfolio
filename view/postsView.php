<?php

require("vendor/autoload.php");

use Eleusis\Portfolio\model\Post;

?>

<?php $title = "Travaux"; ?>

<?php ob_start(); ?>

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 px-5">
		
<?php
$post = new Post();
$posts = $post->getPosts();
while($post = $posts->fetch()) {
?> 

			<div>
				<h3>
					<a href="index.php?action=oneWork&amp;id=<?= $post['id']; ?>"><?= htmlspecialchars($post['title']) ?></a>
					<em>le <?= $post['creation_date_fr'] ?></em>
				</h3> 
				<p><?= nl2br($post['content']) ?></p>			
			</div>

<?php
}
$posts->closeCursor();
?>

		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>