<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=shrek2;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie les informations sur un event
function getEvent($idEvent) {
    $bdd = getBdd();
    $event = $bdd->prepare('SELECT Events.event_id as "id", Places.place_id as "place_id", Players.player_id as "player_id", Events.event_name as "event_name", Places.place_name as "place_name", Players.name as "player_name", Events.event_description as "description", Events.other_event_details as "other_details" from Events left join Places on Events.place_id=Places.place_id left join Players on Events.player_id=Players.player_id where Events.event_id = ?');
    $event->execute(array($idEvent));
    if ($event->rowCount() == 1)
        return $event->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun article ne correspond à l'identifiant '$idEvent'");
}

// Renvoie la liste de tous les events
function getEvents() {
    $bdd = getBdd();
    $events = $bdd->query('SELECT Events.event_id as "id", Places.place_id as "place_id", Players.player_id as "player_id", Events.event_name as "event_name", Places.place_name as "place_name", Players.name as "player_name", Events.event_description as "description", Events.other_event_details as "other_details" from Events left join Places on Events.place_id=Places.place_id left join Players on Events.player_id=Players.player_id order by Events.event_id');
    return $events;
}

// Renvoie les informations sur un player
function getPlayer($idPlayer) {
    $bdd = getBdd();
    $player = $bdd->prepare('SELECT * from Players where player_id = ?');
    $event->execute(array($idPlayer));
    if ($event->rowCount() == 1)
        return $event->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun article ne correspond à l'identifiant '$idPlayer'");
}

// Renvoie la liste de tous les players
function getPlayers() {
    $bdd = getBdd();
    $players = $bdd->query('SELECT * from Players order by player_id');
    return $players;
}

// Renvoie les informations sur une place
function getPlace($idPlace) {
    $bdd = getBdd();
    $place = $bdd->prepare('SELECT * from Place where place_id = ?');
    $event->execute(array($idPlace));
    if ($event->rowCount() == 1)
        return $event->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun article ne correspond à l'identifiant '$idPlace'");
}

// Renvoie la liste de tous les places
function getPlaces() {
    $bdd = getBdd();
    $places = $bdd->query('SELECT * from Places order by place_id');
    return $places;
}

// Ajoute un événement associés à un article
function ajouterEvent($ajout) {
    $bdd = getBdd();
    $ajouts = $bdd->prepare('INSERT INTO Events (event_name, place_id, player_id, event_description, other_event_details) VALUES(?, ?, ?, ?, ?)');
    $ajouts->execute(array($ajout['event'], $ajout['place'], $ajout['player'], $ajout['description'], $ajout['other_info']));
    return $ajouts;
}

// Modifie un événement
function modifierEvent($id) {
    $bdd = getBdd();

    
}
