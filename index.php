<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        // ajouter un événement
        if ($_GET['action'] == 'envoyer') {
            ajouter($_POST);

            // modifier un événement
        } else if ($_GET['action'] == 'modifier') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $eventTemp = getEvent($_GET['id']);

                    modifier($_GET['id']);
                } else
                    throw new Exception("Identifiant d'événement incorrect");
            } else
                throw new Exception("Aucun identifiant d'événement");

            // supprimer un événement
        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $eventTemp2 = getEvent($_GET['id']);

                    supprimer($_GET['id']);

                } else
                    throw new Exception("Identifiant d'événement incorrect");
            } else
                throw new Exception("Aucun identifiant d'événement");
        } else {
            // Fin des actions
            throw new Exception("Action non valide");
        }
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
