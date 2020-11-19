<?php $this->title = "Contact"; ?> 

<div class="container">
	<form class="text-center">
		<div class="form-group">
			<label for=”name”>Nom</label><br>
   			<input type=”text” class=”form-control” id=”name”>
		</div>
		<div class="form-group">
			<label for=”messageTitle”>Titre du message</label><br>
   			<input type=”text” class=”form-control” id=”messageTitle”>
		</div>
		<div class="form-group">
			<label for=”message”>Message</label><br>
   			<textarea class=”form-control” id=”message” cols="70" rows="10"></textarea>
		</div>
		<button type="submit" class="btn btn-info">Envoyer</button>
	</form>
</div>