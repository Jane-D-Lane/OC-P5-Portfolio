<?php $this->title = 'Administration'; ?>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('delete_post'); ?>
			<?= $this->session->show('add_post_view'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h2>Articles</h2>
			<a href="index.php?action=addPost">Nouvel article</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table class="table">
				<thead>
					<tr>
						<td scope="col">Id</td>
						<td scope="col">Titre</td>
						<td scope="col">Contenu</td>
						<td scope="col">Date</td>
						<td scope="col">Actions</td>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($posts as $post) {
				?>
					<tr>
						<th scope="row"><?= htmlspecialchars($post->getId()); ?></td>
						<td><a href="index.php?action=onePost&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars($post->getTitle()); ?></a>
						<td><?= substr(htmlspecialchars($post->getContent()), 0, 150); ?></td>
						<td>Créé le: <?= htmlspecialchars($post->getCreationDate()); ?></td>
						<td>
							<a href="index.php?action=editPost&amp;id=<?= $post->getId(); ?>">Modifier</a>
							<a href="index.php?action=deletePost&amp;id=<?= $post->getId(); ?>">Supprimer</a>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h2>Commentaires signalés</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h2>Utilisateurs</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<table class="table">
				<thead>
					<tr>
						<td scope="col">Id</td>
						<td scope="col">Pseudo</td>
						<td scope="col">Rôle</td>
						<td scope="col">Email</td>
						<td scope="col">Date</td>
						<td scope="col">Actions</td>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($users as $user) {
				?>
					<tr>
						<th scope="row"><?= htmlspecialchars($user->getId()); ?></td>
						<td><?= htmlspecialchars($user->getPseudo()); ?></a>
						<td><?= htmlspecialchars($user->getRole()); ?></a>
						<td><?= htmlspecialchars($user->getEmail()); ?></a>
						<td>Créé le: <?= htmlspecialchars($user->getInscriptionDate()); ?></td>
						<td>En construction</td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>