<?php

require_once 'Modele/Personnage.php';

class ControleurPersonnage {

    private $personnage;

    public function __construct() {
        $this->personnage = new Personnage();
    }

// recherche et retourne les noms pour l'autocomplete
    public function quelsPersos($term) {
        echo $this->personnage->searchPerso($term);
    }

}
?>