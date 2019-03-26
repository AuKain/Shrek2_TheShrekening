<?php

require 'Modele\Modele.php';

// Affiche la liste de tous les articles du blog
function accueil() {
    require 'Vue\vueAccueil.php';
}

// Ajoute un événement à 
function ajouterEvenement($ajout) {
    // AJouter l'événement à l'aide du modèle
    ajouterEvent($ajout);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php');
}

function ajouterPersonnage($ajoutPerso) {
    // AJouter l'événement à l'aide du modèle
    ajouterPlayer($ajoutPerso);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php');
}

// Ajoute un commentaire à un article
function modifierEvenement($id) {

    require 'Vue\vueModifierEvent.php';
}

function modifierPersonnage($ajoutPerso) {

    require 'Vue\vueModifierPlayer.php';
}

function supprimerEvenement($id) {
    $event = getEvent($id);

    require 'Vue\vueConfirmation.php';
}

function supprimerPersonnage($id) {
    $player = getPlayer($id);

    require 'Vue\vueConfirmation.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue\vueErreur.php';
}