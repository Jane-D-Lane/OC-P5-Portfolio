# Blog portfolio

Création d'un blog portfolio avec un forum.

Projet réalisé dans le cadre de la formation Développeur Web Junior de OpenClassrooms (5e projet).

Novembre 2020 - Janvier 2021

## Structure

* HTML, CSS, Bootstrap
* JS (AJAX)
* PHP, MySQL

Architecture MVC et construction en POO

Dossiers : 
* config : contient la configuration de l'application
* public : dossier accessible à l'utilisateur
	* CSS
	* JS
	* fonts
	* images
	* uploads (images postées par l'admin)
* src : contient la logique de l'application
	* model
	* controller
	* view
	* DAO : requêtes SQL
	* constraint : contraintes de validation des données
* vendor : contient la gestion de l'autoload de Composer pour appeler les classes

	