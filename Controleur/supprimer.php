<?php

require '..\Modele\modele.php';

try {

    if (isset($_POST['id'])) {

        // ajouter un événement// intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_POST['id']);
        if ($id != 0) {
            
            $bdd = getBdd();
            $req = $bdd->prepare('DELETE from Events where event_id=?');
            $req->execute(array($_POST['id']));

        } else
            throw new Exception("Identifiant d'événement incorrect");

    } else
        throw new Exception("Aucun identifiant d'événement");
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require '..\Vue\vueErreur.php';
}

// Redirection du visiteur vers la page d'accueil
header('Location: ..\index.php');