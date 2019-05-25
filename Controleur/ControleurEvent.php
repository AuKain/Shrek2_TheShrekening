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
        $vue = new Vue("Events/index");
        $vue->generer(['events' => $events, 'players' => $players, 'places' => $places], $this->requete);
    }
}
?>