<?php

require_once 'Modele/Event.php';
require_once 'Modele/Player.php';
require_once 'Modele/Place.php';
require_once 'Vue/vue.php';

class ControleurEvent {

    private $event;
    private $player;
    private $place;

    public function __construct() {
        $this->event = new Event();
        $this->player = new Player();
        $this->place = new Place();
    }

    public function ajouter($event) {
        $this->event->setEvent($event);
    }

    public function modifier($id) {
        $event = $this->event->getEvent($id);
        $players = $this->player->getPlayers()->fetchAll();
        $places = $this->place->getPlaces()->fetchAll();
        $vue = new Vue("ModifierEvent");
        $vue->generer(['event'=> $event, 'players' => $players, 'places' => $places]);
    }

    public function mettreAJour($event) {
        $this->event->modifierEvent($event);
    }

    public function confirmer($id) {
        $type = 'Event';
        $vue = new Vue("Confirmation");
        $vue->generer(['donnee' => $this->event->getEvent($id), 'type' => $type]);
    }

    public function supprimer($id) {
        $this->event->supprimerEvent($id);
    }

    public function events() {
        $events = $this->event->getEvents()->fetchAll();
        $players = $this->player->getPlayers()->fetchAll();
        $places = $this->place->getPlaces()->fetchAll();
        $vue = new Vue("Accueil");
        $vue->generer(['events' => $events, 'players' => $players, 'places' => $places]);
    }
}
?>