<?php

require '..\Modele\modele.php';

try {
    if (isset($_POST['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_POST['id']);
        if ($id != 0) {
            
            if ($_POST['table'] == 'Event') {
            
                $bdd = getBdd();
                $req = $bdd->prepare('UPDATE Events SET event_name = ?, place_id = ?,player_id = ?, event_description = ?, other_event_details = ? WHERE event_id = ?');
                $req->execute(array($_POST['event'], $_POST['place'], $_POST['player'], $_POST['description'], $_POST['other_info'], $_POST['id']));
            
            } else if ($_POST['table'] == 'Player') {

                if ( filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL) !== false ) {
                    if (filter_var($_POST['number_of_legs'], FILTER_VALIDATE_INT) !== false && $_POST['number_of_legs'] >= 0 ) {
                        
                        $bdd = getBdd();
                        $req = $bdd->prepare('UPDATE Players SET name = ?, courriel = ?, gender = ?, number_of_legs = ?, other_player_details = ? WHERE player_id = ?');
                        $req->execute(array($_POST['name'], $_POST['courriel'], $_POST['gender'], $_POST['number_of_legs'], $_POST['other_player_details'], $_POST['id']));

                    } else 
                        throw new Exception("Le nombre de jambe doit être un nombre entier positif.");
                } else 
                    throw new Exception("L'adresse courriel n'a pas le bon format. (exemple@domaine.com)");
            } else 
                throw new Exception("Table non valide");
        } else
            throw new Exception("Identifiant d'événement incorrect");
    } else
        throw new Exception("Aucun identifiant d'événement");
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require '..\Vue\vueErreur.php'; //TODO n'entre pas dans la vue, mais arrive bel et bien à cette ligne??
}

// Redirection du visiteur vers la page d'accueil
header('Location: ..\index.php');