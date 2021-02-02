<?php $this->title = "Forum"; ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <?= $this->session->show('register'); ?>
      <?= $this->session->show('login'); ?>
      <?= $this->session->show('logout'); ?>
      <?= $this->session->show('delete_account'); ?>
    </div>
  </div>
  
  <div class="row">
    <?php
    if($this->session->get('pseudo')) {
    ?>
    <div class="col-12 col-lg-6 d-flex justify-content-start">
      <a class="btn btn-primary" href="index.php?action=addTopic" role="button">Nouveau sujet</a>
    </div>
    <div class="col-12 d-flex justify-content-end">
      <a class="btn btn-primary" href="index.php?action=profile" role="button">Profil</a>
      <a class="btn btn-primary" href="index.php?action=logout" role="button">Deconnexion</a>
    </div>
    <?php
    } else {
    ?>
    <div class="col-12 d-flex justify-content-end">
      <a class="btn btn-primary" href="index.php?action=register" role="button">Inscription</a>
      <a class="btn btn-primary" href="index.php?action=login" role="button">Connexion</a>
    </div>
    <?php
    }
    ?>
  </div>
  <br>
	<div class="row">
		<div class="col-12 text-center">
			<table class="table table-hover">
  				<thead>
    				<tr>
      					<th scope="col">Sujet</th>
      					<th scope="col">Auteur</th>
      					<th scope="col">Nombre de messages</th>
      					<th scope="col">Dernier message</th>
    				</tr>
  				</thead>
  				<tbody>
          <?php
          foreach ($topics as $topic) {
          ?>
   		 			<tr class="table-active">
      					<th scope="row"><a href="index.php?action=oneTopic&amp;topicId=<?= $topic->getId(); ?>"><?= htmlspecialchars($topic->getTitle()); ?></a></th>
      					<td><?= htmlspecialchars($topic->getPseudo()); ?></td>
      					<td><?= htmlspecialchars($topic->getNbMessage()); ?></td>
      					<td><?= htmlspecialchars($topic->getLastReply()); ?></td>
    				</tr>
          <?php
          }
          ?>
    			</tbody>
			</table>
		</div>
	</div>
</div>