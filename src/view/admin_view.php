<?php $this->title = 'Administration'; ?>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('delete_post'); ?>
			<?= $this->session->show('add_post_view'); ?>
			<?= $this->session->show('delete_user'); ?>
			<?= $this->session->show('delete_comment'); ?>
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
						<td>Id</td>
						<td>Titre</td>
						<td>Contenu</td>
						<td>Date</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($posts as $post) {
				?>
					<tr>
						<td><?= htmlspecialchars($post->getId()); ?></td>
						<td><a href="index.php?action=onePost&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></td>
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
		<table class="table">
			<thead>
    			<tr>
       				<td>Id</td>
        			<td>Pseudo</td>
        			<td>Message</td>
        			<td>Date</td>
        			<td>Actions</td>
    			</tr>
    		</thead>
    		<tbody>
			<?php
			foreach ($comments as $comment)
			{
    		?>
    			<tr>
        			<td><?= htmlspecialchars($comment->getId()); ?></td>
        			<td><?= htmlspecialchars($comment->getPseudo()); ?></td>
        			<td><?= substr(htmlspecialchars($comment->getComment()), 0, 150); ?></td>
        			<td>Créé le : <?= htmlspecialchars($comment->getCommentDate()); ?></td>
        			<td>
            			<a href="index.php?action=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
           				<a href="index.php?action=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
        			</td>
    			</tr>
    		<?php
			}
			?>
			</tbody>
    	</table>
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
						<td>Id</td>
						<td>Pseudo</td>
						<td>Rôle</td>
						<td>Email</td>
						<td>Date</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ($users as $user) {
				?>
					<tr>
						<td><?= htmlspecialchars($user->getId()); ?></td>
						<td><?= htmlspecialchars($user->getPseudo()); ?></td>
						<td><?= htmlspecialchars($user->getRole()); ?></td>
						<td id="mailProfile"><?= htmlspecialchars($user->getEmail()); ?></td>
						<td>Créé le: <?= htmlspecialchars($user->getInscriptionDate()); ?></td>
						<td>
							<?php
							if($user->getRole()!= 'admin') {
							?>
							<p id="warning"></p>
							<a href="index.php?action=deleteUser&amp;userId=<?= $user->getId(); ?>">Supprimer</a>
							<?php
							} else {
							?>
							Suppression impossible
							<?php
							}
							?>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>