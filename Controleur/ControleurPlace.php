<?php

require_once 'Modele/Place.php';
require_once 'Vue/vue.php';

class ControleurPlace {

    private $place;

    public function __construct() {
        $this->place = new Place();
    }

    public function articles() {
        $places = $this->place->getPlaces();
    }
}
?>