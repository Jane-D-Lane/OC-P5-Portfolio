<?php $this->title = "Forum"; ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <?= $this->session->show('register'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-lg-6 d-flex justify-content-start">
      <a href="index.php?action=addTopic"><button type="button" class="btn btn-primary">Nouveau sujet</button></a>
    </div>
    <div class="col-12 col-lg-6 d-flex justify-content-end">
      <a href="index.php?action=register"><button type="button" class="btn btn-primary">Inscription</button></a>
      <a href="index.php?action=login"><button type="button" class="btn btn-primary">Connexion</button></a>
    </div>
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
   		 			<tr class="table-active">
      					<th scope="row">Active</th>
      					<td>Column content</td>
      					<td>Column content</td>
      					<td>Column content</td>
    				</tr>
    			</tbody>
			</table>
		</div>
	</div>
</div>