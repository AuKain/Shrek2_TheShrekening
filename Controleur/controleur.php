<?php

require 'Modele\Modele.php';

// Affiche la liste de tous les articles du blog
function accueil() {
    $events = getEvents();
    require 'Vue\vueAccueil.php';
}

// Ajoute un événement à 
function ajouter($ajout) {
    // AJouter le commentaire à l'aide du modèle
    ajouterEvent($ajout);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php');
}

// Ajoute un commentaire à un article
function modifier($id) {
    // AJouter le commentaire à l'aide du modèle
    $event = getEvent($id);

    require 'Vue\vueModifier.php';
}

function supprimer($id) {
    $event = getEvent($id);

    require 'Vue\vueConfirmation.php';
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue\vueErreur.php';
}