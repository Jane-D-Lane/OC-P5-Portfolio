<?php 

$action = isset($post) && $post->getId() ? 'editPost&id=' .$post->getId() : 'addPost';
$title = isset($post) && $post->getTitle() ? htmlspecialchars($post->getTitle()) : '';
$content = isset($post) && $post->getContent() ? htmlspecialchars($post->getContent()) : '';
$img = isset($post) && $post->getImg() ? htmlspecialchars($post->getImg()) : '';
$submit = $action ==='addPost' ? 'Envoyer' : 'Mettre à jour';

?>

<form method="post" action="index.php?action=<?= $action; ?>" enctype="multipart/form-data">
	<label for="title">Titre</label><br>
	<input type="text" name="title" id="title" value="<?= $title; ?>"><br>
	<?= isset($errors['title']) ? $errors['title'] : ''; ?>
	<label for="content">Contenu</label><br>
	<textarea rows="10" cols="100" id="content" name="content"><?= $content ?></textarea><br>
	<?= isset($errors['content']) ? $errors['content'] : ''; ?>
	<div class="form-group">
      	<input type="file" class="form-control-file" name='img' id="img" aria-describedby="fileHelp">
      	<small id="fileHelp" class="form-text text-muted">Ne pas dépasser les 8 Mo.</small>
    </div>
	<input type="submit" class="btn btn-info" value="<?= $submit ?>" name="submit" id="submit">
</form>
