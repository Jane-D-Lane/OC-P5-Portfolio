<?php 

require('config/dev.php');
require('vendor/autoload.php');
require('src/controller/frontController.php');

$routeur = new Eleusis\Portfolio\config\Routeur();
$routeur->run();