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

    public function ajouter() {
        $player = [
            'name' => $this->requete->getParametre('name'),
            'courriel' => $this->requete->getParametre('courriel'),
            'gender' => $this->requete->getParametre('gender'),
            'number_of_legs' => $this->requete->getParametre('number_of_legs'),
            'photo' => $this->requete->getParametre('photo'),
            'other_player_details' => $this->requete->getParametre('other_player_details')
        ];

        if ( filter_var($player['courriel'], FILTER_VALIDATE_EMAIL) !== false ) {
            if (filter_var($player['number_of_legs'], FILTER_VALIDATE_INT) !== false && $player['number_of_legs'] >= 0 ) {
                
                $this->player->setPlayer($player);
                header('Location:index.php');

            } else {
                throw new Exception("Le nombre de jambe doit être un nombre entier positif.");
            }
        } else {
            throw new Exception("L'adresse courriel n'a pas le bon format. (exemple@domaine.com)");
        }
    }

    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $player = $this->player->getPlayer($id);
        $vue = new Vue("modifier", "Players");
        $vue->generer(['player' => $player]);
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

    public function confirmer() {
        $id = $this->requete->getParametreId('id');
        $vue = new Vue("confirmation", "Players");
        $vue->generer(['donnee' => $this->player->getPlayer($id), 'type' => $type]);
    }

    public function supprimer() {
        $id = $this->requete->getParametreId('id');
        $this->player->supprimerPlayer($id);
        header('Location:index.php');
    }
}
?>