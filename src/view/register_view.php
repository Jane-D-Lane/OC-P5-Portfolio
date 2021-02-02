<?php $this->title = "Inscription"; ?>

<div class="container">
	<div class="text-center">
		<form method="post" action="index.php?action=register">
			<div class="form-group">
				<label for="pseudo">Pseudo</label><br>
				<input type="text" name="pseudo" id="pseudo">
			</div>
			<?= isset($errors['pseudo']) ? $errors['pseudo']: ''; ?>
			<div class="form-group">
				<label for="password">Mot de passe</label><br>
				<input type="password" name="password" id="password">
			</div>
			<?= isset($errors['password']) ? $errors['password']: ''; ?>
			<div class="form-group">
				<label for="email">Email</label><br>
				<input type="email" name="email" id="email">
			</div>	
			<?= isset($errors['email']) ? $errors['email']: ''; ?>		
			<input type="submit" class="btn btn-info" name="submit" id="submit" value="S'inscrire">
		</form>
		<a href="index.php?action=forumHome">Retour au forum</a>
	</div>
</div>