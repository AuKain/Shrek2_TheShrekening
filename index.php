<?php
require 'Modele\modele.php';
try {
    $events = getEvents();
    require 'Vue\vueAccueil.php';
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'Vue\vueErreur.php';
}