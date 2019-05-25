<?php

require_once 'Framework/Controleur.php';
require_once 'Framework/Vue.php';

class ControleurPropos extends Controleur {

    public function __construct() {
    }

    // recherche et retourne les noms pour l'autocomplete
    public function index() {
        $vue = new Vue("propos");
        $vue->generer([null], $this->requete);
    }
}

?>