<?php

require_once 'Modele/Event.php';
require_once 'Modele/Player.php';
require_once 'Modele/Place.php';
require_once 'Framework/Vue.php';

class ControleurEvent extends Controleur {

    private $event;
    private $player;
    private $place;

    public function __construct() {
        $this->event = new Event();
        $this->player = new Player();
        $this->place = new Place();
    }

    public function index() {
        $events = $this->event->getEvents()->fetchAll();
        $players = $this->player->getPlayers()->fetchAll();
        $places = $this->place->getPlaces()->fetchAll();
        $vue = new Vue("accueil");
        $vue->generer(['events' => $events, 'players' => $players, 'places' => $places]);
    }

    public function ajouter() {
        $event = [
            'event' => $this->requete->getParametre('event'),
            'place' => $this->requete->getParametre('place'),
            'player' => $this->requete->getParametre('player'),
            'description' => $this->requete->getParametre('description'),
            'other_info' => $this->requete->getParametre('other_info')
        ];
        $this->event->setEvent($event);
        header('Location:index.php');
    }

    public function modifier() {
        $id = $this->requete->getParametre('id');
        $event = $this->event->getEvent($id);
        $players = $this->player->getPlayers()->fetchAll();
        $places = $this->place->getPlaces()->fetchAll();
        $vue = new Vue("modifier", "Events");
        $vue->generer(['event'=> $event, 'players' => $players, 'places' => $places]);
    }

    public function mettreAJour() {
        $event = [
            'event' => $this->requete->getParametre('event'),
            'place' => $this->requete->getParametre('place'),
            'player' => $this->requete->getParametre('player'),
            'description' => $this->requete->getParametre('description'),
            'other_info' => $this->requete->getParametre('other_info'),
            'id' => $this->requete->getParametreId('id')
        ];
        $this->event->modifierEvent($event);
        header('Location:index.php');
    }

    public function confirmer() {
        $id = $this->requete->getParametreId('id');
        $type = 'Events';
        $vue = new Vue("confirmation", "Events");
        $vue->generer(['donnee' => $this->event->getEvent($id), 'type' => $type]);
    }

    public function supprimer() {
        $id = $this->requete->getParametreId('id');
        $this->event->supprimerEvent($id);
        header('Location:index.php');
    }

    public function retablir() {
        $events = $this->event->getDeadEvents();
        $vue = new Vue("retablir", "Events");
        $vue->generer(['events' => $events]);
    }

    public function revivre() {
        $id = $this->requete->getParametreId('id');
        $this->event->unSupprimerEvent($id);
        header('Location:index.php');
    }
}
?>