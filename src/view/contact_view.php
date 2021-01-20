<?php $this->title = "Contact"; ?> 

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<?= $this->session->show('error_contact'); ?>
			<?= $this->session->show('send_mail'); ?>
		</div>
	</div>
	<div class="row my-4">
		<div class="col-12 text-center">
			<form method="post" action="index.php?action=sendMail">
				<div class="form-group">
					<label for=”name”>Nom</label><br>
   					<input type=”text” name="name" id=”name”>
				</div>
				<?= isset($errors['name']) ? $errors['name']: ''; ?>
				<div class="form-group">
					<label for=”email”>Email</label><br>
   					<input type=”text” name="email" id=”email”>
				</div>
				<?= isset($errors['email']) ? $errors['email']: ''; ?>
				<div class="form-group">
					<label for=”messageTitle”>Titre du message</label><br>
   					<input type=”text” name="messageTitle" id=”messageTitle”>
				</div>
				<?= isset($errors['messageTitle']) ? $errors['messageTitle']: ''; ?>
				<div class="form-group">
					<label for=”message”>Message</label><br>
   					<textarea name='message' id=”message” cols="70" rows="10"></textarea>
				</div>
				<?= isset($errors['message']) ? $errors['message']: ''; ?>
				<input type="submit" value="Envoyer" name="submit" id="submit">
			</form>
		</div>
	</div>
</div>