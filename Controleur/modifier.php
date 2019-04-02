<?php

if (isset($post['id'])) {
    // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
    $id = intval($post['id']);
    if ($id != 0) {
        
        if ($post['table'] == 'Event') {
        
            $bdd = getBdd();
            $req = $bdd->prepare('UPDATE Events SET event_name = ?, place_id = ?,player_id = ?, event_description = ?, other_event_details = ? WHERE event_id = ?');
            $req->execute(array($post['event'], $post['place'], $post['player'], $post['description'], $post['other_info'], $post['id']));
        
        } else if ($post['table'] == 'Player') {

            if ( filter_var($post['courriel'], FILTER_VALIDATE_EMAIL) !== false ) {
                if (filter_var($post['number_of_legs'], FILTER_VALIDATE_INT) !== false && $post['number_of_legs'] >= 0 ) {
                    
                    $bdd = getBdd();
                    $req = $bdd->prepare('UPDATE Players SET name = ?, courriel = ?, gender = ?, number_of_legs = ?, other_player_details = ? WHERE player_id = ?');
                    $req->execute(array($post['name'], $post['courriel'], $post['gender'], $post['number_of_legs'], $post['other_player_details'], $post['id']));

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
    
// Redirection du visiteur vers la page d'accueil
header('Location: index.php');