<?php

require_once 'Modele/Player.php';
require_once 'Vue/vue.php';

class ControleurPlayer {

    private $player;

    public function __contruct() {
        $this->player = new Player();
    }

    public function ajouter($player) {
        if ( filter_var($player['courriel'], FILTER_VALIDATE_EMAIL) !== false ) {
            if (filter_var($player['number_of_legs'], FILTER_VALIDATE_INT) !== false && $player['number_of_legs'] >= 0 ) {
                //ajouter a la db
            } else {
                throw new Exception("Le nombre de jambe doit être un nombre entier positif.");
            }
        } else {
            throw new Exception("L'adresse courriel n'a pas le bon format. (exemple@domaine.com)");
        }
    }

    public function modifier($id) {
        
    }

    public function confirmer($id) {

    }

    public function supprimer($id) {

    }
}
?>