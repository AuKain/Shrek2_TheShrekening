<?php

require '..\Modele\modele.php';

try {
    if (isset($_POST['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_POST['id']);
        if ($id != 0) {
            
            $bdd = getBdd();
            $req = $bdd->prepare('UPDATE Events SET event_name = ?, place_id = ?, player_id = ?, event_description = ?, other_event_details = ? WHERE event_id = ?');
            $req->execute(array($_POST['event'], $_POST['place'], $_POST['player'], $_POST['description'], $_POST['other_info'], $_POST['id']));

        } else
            throw new Exception("Identifiant d'article incorrect");
    } else
        throw new Exception("Aucun identifiant d'article");
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require '..\Vue\vueErreur.php';
}

// Redirection du visiteur vers la page d'accueil
header('Location: ..\index.php');