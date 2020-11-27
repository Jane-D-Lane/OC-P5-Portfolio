<?php

namespace Eleusis\Portfolio\src\constraint;

// Contient les contraints de l'application sur la validation des données
class Constraint {

	// Si le champ est vide
	public function notBlank($name, $value) {
		if(empty($value)) {
			return '<p style="color: red;">Le champ ' .$name. ' est vide</p>';
		}
	}

	// Longueur minimale de la chaine de données
	public function minLenght($name, $value, $minSize) {
		if(strlen($value) < $minSize) {
			return '<p style="color: red;">Le champ ' .$name. ' doit contenir au moins ' .$minSize. ' caractères</p>';
		}
	}

	// Longueur maximale de la chaine de données
	public function maxLenght($name, $value, $maxSize) {
		if(strlen($value) > $maxSize) {
			return '<p style="color: red;">Le champ ' .$name. ' doit contenir au maximum ' .$maxSize. ' caractères</p>';
		}
	}

}