<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {

        // ajouter un événement
        if ($_GET['action'] == 'envoyerEvent') {

            ajouterEvenement($_POST);

            // modifier un événement
        } else if ($_GET['action'] == 'modifierEvent') {

            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $eventTemp = getEvent($_GET['id']);

                    modifierEvenement($_GET['id']);
                } else
                    throw new Exception("Identifiant d'événement incorrect");
            } else
                throw new Exception("Aucun identifiant d'événement");

            // supprimer un événement
        } else if ($_GET['action'] == 'supprimerEvent') {

            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $eventTemp2 = getEvent($_GET['id']);

                    supprimerEvenement($_GET['id']);

                } else
                    throw new Exception("Identifiant d'événement incorrect");
            } else
                throw new Exception("Aucun identifiant d'événement");

        } else if ($_GET['action'] == 'envoyerPlayer') {

            if ( filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL) !== false ) {
                if (filter_var($_POST['number_of_legs'], FILTER_VALIDATE_INT) !== false && $_POST['number_of_legs'] >= 0 ) {
                    ajouterPersonnage($_POST);
                } else {
                    throw new Exception("Le nombre de jambe doit être un nombre entier positif.");
                }
            } else {
                throw new Exception("L'adresse courriel n'a pas le bon format. (exemple@domaine.com)");
            }
            

        } else if ($_GET['action'] == 'modifierPlayer') {

            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $playerTemp = getPlayer($_GET['id']);

                    modifierPersonnage($_GET['id']);
                } else
                    throw new Exception("Identifiant de personnage incorrect");
            } else
                throw new Exception("Aucun identifiant de personnage");

        } else if ($_GET['action'] == 'supprimerPlayer') {

            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $playerTemp2 = getPlayer($_GET['id']);

                    supprimerPersonnage($_GET['id']);

                } else
                    throw new Exception("Identifiant de personnage incorrect");
            } else
                throw new Exception("Aucun identifiant de personnage");
        
        } else if ($_GET['action'] == 'quelsTypes') {
            quelsTypes($_GET['term']);

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