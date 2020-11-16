<?php $title = "Accueil"; ?>

<?php ob_start(); ?>

<div class="container py-5">
   <div class="row">
      <div class="col-12 col-lg-6">
         <div id="imageFondu" class="text-center">
            <img class="w-50" src="public/images/eleusisHome.jpg">
         </div>
      </div>
      <div class="col-12 col-lg-6">
         <h2>Je suis Eleusis, illustratrice et exploratrice de terrains inconnus !</h2>
         <div id="separateur" class="text-center">
            <p>.  .  .  .  .</p>
         </div>
         <p>Je dessine depuis toujours et ma motivation principale est d'essayer de capturer la réalité qui m'entoure et de la transformer. Je suis attirée par la pop-culture et tout ce qui concerne l'imaginaire, la fantasy, les films, les jeux vidéo, le jeu de rôle...</p>
         <p>J'ai créé ce site pour partager mon travail et pour rassembler des gens bienveillants pour discuter de plein de choses. Tous les rêveurs sont les bienvenus !</p>
      </div>
   </div>
</div>
<div class="container py-5">
	<div class="row">
   		<div class="col-12 col-lg-4">
   			<div class="card border-primary mb-3">
   				<img class="card-img-top" src="public/images/crayons.jpg" alt="crayons">
   				<div class="card-body">
   					<h5 class="card-title">Techniques multiples</h5>
   					<p class="card-text">Aquarelle, encre de Chine, tablette graphique... Différents supports pour différents rendus.</p>
   					<a class="btn btn-info" href="#" role="button">Lien</a>
   				</div>
   			</div>
   		</div>
   		<div class="col-12 col-lg-4">
   			<div class="card border-primary">
   				<img class="card-img-top" src="public/images/bd.jpg" alt="bd">
   				<div class="card-body">
   					<h5 class="card-title">Secteurs d'inspirations</h5>
   					<p class="card-text">De la musique à la pop culture, les dessins englobent une multiplicité de points de vue sur le monde.</p>
   					<a class="btn btn-info" href="#" role="button">Lien</a>
   				</div>
   			</div>
   		</div>
   		<div class="col-12 col-lg-4">
   			<div class="card border-primary">
   				<img class="card-img-top" src="public/images/carteNoel.jpg" alt="carte de Noël">
   				<div class="card-body">
   					<h5 class="card-title">Demande de projet</h5>
   					<p class="card-text">Bande-dessinée ou illustration de cartes postales ? Un travail spécifique pour tout type de demande.</p>
   					<a class="btn btn-info" href="#" role="button">Lien</a>
   				</div>
   			</div>
   		</div>
   	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('src/view/template.php'); ?>