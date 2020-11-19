<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="public/site.css">
		<title><?= $title ?></title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<nav class="col navbar navbar-expand-lg navbar-dark bg-primary">
  					<a class="navbar-brand" href="index.php">Les Tiroirs d'Eleusis</a>
  					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
   	 					<span class="navbar-toggler-icon"></span>
  					</button>
  					<div class="collapse navbar-collapse" id="navbarColor01">
    					<ul class="navbar-nav mr-auto">
      					<li class="nav-item active">
        					<a class="nav-link" href="index.php">Accueil
        							</a>
      					</li>
      					<li class="nav-item">
        					<a class="nav-link" href="index.php?action=posts">Travaux</a>
      					</li>
      					<li class="nav-item">
        					<a class="nav-link" href="#">Forum</a>
      					</li>
      					<li class="nav-item">
        					<a class="nav-link" href="index.php?action=contact">Contact</a>
      					</li>
    					</ul>
  					</div>
					</nav>
				</div>
			</div>	
		<div class="container">
			<div class="row">
     	 	<div class="col">
         	<div class="jumbotron text-center">
						<h1>Les Tiroirs d'Eleusis</h1>
						<h2>Illustrations</h2>
					</div>
      	</div>
      </div>
   	</div> 
    <?= $content ?>
    <footer class="page-footer container">
   		<div class="container bg-dark text-center text-md-left pt-4">
   			<div class="row">
  				<div class="col-md-4">
            <h5>Menu</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#">Link 1</a>
              </li>
              <li>
                <a href="#">Link 2</a>
              </li>
            </ul>
   				</div>
          <div class="col-md-4">
            <h5>Catégories</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#">Link 1</a>
              </li>
              <li>
                <a href="#">Link 2</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>Réseaux sociaux</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#">Link 1</a>
              </li>
              <li>
                <a href="#">Link 2</a>
              </li>
            </ul>
          </div>
   			</div>
   		</div>
      <div class="footer-copyright bg-primary text-center py-2">© L.M.Eleusis Tous droits réservés</div>
    </footer>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>