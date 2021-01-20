<?php

use Eleusis\Portfolio\src\DAO\PostDAO;

?>

<?php $this->title = "Travaux"; ?>

<div class="container">
	<div class="row">

<?php
foreach($posts as $post) {
?> 

		<div class="col-12 col-md-4 px-4 card-group">
			<div class="card border-primary mb-3">
				<div class="card-header text-center"><?= $post->getCreationDate() ?></div>
				<div class="card-body">
					<?php
					if ($post->getImg()) {
					?>
					<div>
						<a href="index.php?action=onePost&amp;id=<?= $post->getId(); ?>"><img class="card-img-top" src="public/uploads/<?= $post->getImg() ?>" max-width="100px"></a>
					</div><br>
					<?php
					}
					?>			
    				<h4 class="card-title text-center"><a href="index.php?action=onePost&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars($post->getTitle()) ?></a></h4>
  				</div>
			</div>
		</div>

<?php
}
?>
		
	</div>
	<div class="row">
		<nav class="col-12">
            <ul class="pagination justify-content-center">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            	<li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                	<a href="index.php?action=posts&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            	</li>
            	<?php for($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            	<li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                	<a href="index.php?action=posts&page=<?= $page ?>" class="page-link"><?= $page ?></a>
            	</li>
            	<?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            	<li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                	<a href="index.php?action=posts&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            	</li>
            </ul>
        </nav>
	</div>
</div>

