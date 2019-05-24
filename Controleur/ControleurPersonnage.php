<?php

require_once 'Modele/Personnage.php';
require_once 'Framework/Controleur.php';

class ControleurPersonnage extends Controleur {

    private $personnage;

    public function __construct() {
        $this->personnage = new Personnage();
    }

    // recherche et retourne les noms pour l'autocomplete
    public function index() {
        $term = $this->requete->getParametre('term');
        echo $this->personnage->searchPerso($term);
    }
}

?>