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
      <a href="index.php?action=addTopic"><button type="button" class="btn btn-primary">Nouveau sujet</button></a>
    </div>
    <div class="col-12 d-flex justify-content-end">
      <a href="index.php?action=profile"><button type="button" class="btn btn-primary">Profil</button></a>
      <a href="index.php?action=logout"><button type="button" class="btn btn-primary">Deconnexion</button></a>
    </div>
    <?php
    } else {
    ?>
    <div class="col-12 d-flex justify-content-end">
      <a href="index.php?action=register"><button type="button" class="btn btn-primary">Inscription</button></a>
      <a href="index.php?action=login"><button type="button" class="btn btn-primary">Connexion</button></a>
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
      					<th scope="col">Nb</th>
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
      					<td>Column content</td>
      					<td><?= htmlspecialchars($topic->getCreationDate()); ?></td>
    				</tr>
          <?php
          }
          ?>
    			</tbody>
			</table>
		</div>
	</div>
</div>