<?php

require_once 'Modele/Place.php';

class ControleurPlace extends Controleur {

    private $place;

    public function __construct() {
        $this->place = new Place();
    }

    public function index() {

    }

    public function articles() {
        $places = $this->place->getPlaces();
    }
}
?>