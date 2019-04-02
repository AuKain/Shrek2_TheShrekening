<?php

if (isset($post['id'])) {

    // ajouter un événement// intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
    $id = intval($post['id']);
    if ($id != 0) {
        
        if ($post['table'] == 'Event') {

            $bdd = getBdd();
            $req = $bdd->prepare('DELETE from Events where event_id=?');
            $req->execute(array($post['id']));
            
        } else if ($post['table'] == 'Player') {

            $bdd = getBdd();
            $req = $bdd->prepare('DELETE from Players where player_id=?');
            $req->execute(array($post['id']));

        } else
            throw new Exception("Table non valide");

    } else
        throw new Exception("Identifiant d'événement incorrect");

} else
    throw new Exception("Aucun identifiant d'événement");

// Redirection du visiteur vers la page d'accueil
header('Location: index.php');