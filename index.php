<?php 

//Constante de configuration
require('config/dev.php');
//Appel à l'autoloader
require('vendor/autoload.php');

session_start();

// Lance le routeur sur l'action demandée 
$routeur = new Eleusis\Portfolio\config\Routeur();
$routeur->run();