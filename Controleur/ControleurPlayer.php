<?php

require_once 'Modele/Player.php';
require_once 'Framework/Vue.php';

class ControleurPlayer extends Controleur {

    private $player;

    public function __construct() {
        $this->player = new Player();
    }

    public function index() {

    }

    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $player = $this->player->getPlayer($id);
        $vue = new Vue("modifier", "Players");
        $vue->generer(['player' => $player], $this->requete);
    }

    public function mettreAJour() {
        $player = [
            'name' => $this->requete->getParametre('name'),
            'courriel' => $this->requete->getParametre('courriel'),
            'gender' => $this->requete->getParametre('gender'),
            'number_of_legs' => $this->requete->getParametre('number_of_legs'),
            'other_player_details' => $this->requete->getParametre('other_player_details'),
            'id' => $this->requete->getParametreId('id')
        ];
        $this->player->modifierPlayer($player);
        header('Location:index.php');
    }
}
?>