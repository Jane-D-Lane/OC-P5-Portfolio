<?php 

$action = isset($post) && $post->getId() ? 'editPost&id=' .$post->getId() : 'addPost';
$title = isset($post) && $post->getTitle() ? htmlspecialchars($post->getTitle()) : '';
$content = isset($post) && $post->getContent() ? htmlspecialchars($post->getContent()) : '';
$submit = $action ==='addPost' ? 'Envoyer' : 'Mettre à jour';

?>

<form method="post" action="index.php?action=<?= $action; ?>">
	<label for="title">Titre</label><br>
	<input type="text" name="title" id="title" value="<?= $title; ?>"><br>
	<label for="content">Contenu</label><br>
	<textarea rows="10" cols="100" id="content" name="content" value="<?= $content ?>"></textarea><br>
	<input type="submit" value="<?= $submit ?>" name="submit" id="submit">
</form>