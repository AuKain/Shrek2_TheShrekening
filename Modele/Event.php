<?php

    require_once 'Framework/Modele.php';

    class Event extends Modele {

        // Renvoie les informations sur un event
        public function getEvent($idEvent) {
            $sql = 'SELECT Events.event_id as "id", Places.place_id as "place_id", Players.player_id as "player_id", Events.event_name as "name", Places.place_name as "place_name", Players.name as "player_name", Events.event_description as "description", Events.other_event_details as "other_details" from Events left join Places on Events.place_id=Places.place_id left join Players on Events.player_id=Players.player_id where Events.event_id = ?';
            $event = $this->executerRequete($sql, [$idEvent]);
            
            if ($event->rowCount() == 1)
                return $event->fetch();  // Accès à la première ligne de résultat
            else
                throw new Exception("Aucun article ne correspond à l'identifiant '$idEvent'");
        }
        
        // Renvoie la liste de tous les events
        public function getEvents() {
            $sql = 'SELECT Events.event_id as "id", Places.place_id as "place_id", Players.player_id as "player_id", Events.event_name as "name", Places.place_name as "place_name", Players.name as "player_name", Events.event_description as "description", Events.other_event_details as "other_details" from Events left join Places on Events.place_id=Places.place_id left join Players on Events.player_id=Players.player_id where deleted = 0 order by Events.event_id';
            $events = $this->executerRequete($sql);
            return $events;
        }

        // Renvoie la liste de tous les events supprimés mais concervés temporairemnent
        public function getDeadEvents() {
            $sql = 'SELECT Events.event_id as "id", Places.place_id as "place_id", Players.player_id as "player_id", Events.event_name as "name", Places.place_name as "place_name", Players.name as "player_name", Events.event_description as "description", Events.other_event_details as "other_details" from Events left join Places on Events.place_id=Places.place_id left join Players on Events.player_id=Players.player_id where deleted = 1 order by Events.event_id';
            $events = $this->executerRequete($sql);
            return $events;
        }

        // Ajoute un événement
        public function setEvent($ajout) {
            $sql = 'INSERT INTO Events (event_name, place_id, player_id, event_description, other_event_details) VALUES(?, ?, ?, ?, ?)';
            $ajouts = $this->executerRequete($sql, [$ajout['event'], $ajout['place'], $ajout['player'], $ajout['description'], $ajout['other_info']]);
            return $ajouts;
        }

        // Modifie un événement
        public function modifierEvent($event) {
            if (isset($event['id'])) {
                if ($event['id'] != 0) {
                    
                    $sql = 'UPDATE Events SET event_name = ?, place_id = ?, player_id = ?, event_description = ?, other_event_details = ? WHERE event_id = ?';
                    $req = $this->executerRequete($sql, [$event['event'], $event['place'], $event['player'], $event['description'], $event['other_info'], $event['id']]);
                    return $req;

                } else
                    throw new Exception("Identifiant d'événement incorrect");
            } else
                throw new Exception("Aucun identifiant d'événement");
        }

        public function supprimerEvent($id) {
            $sql = 'UPDATE Events set deleted = 1 where event_id=?';
            $req = $this->executerRequete($sql, [$id]);
            return $req;
        }

        public function unSupprimerEvent($id) {
            $sql = 'UPDATE Events set deleted = 0 where event_id=?';
            $req = $this->executerRequete($sql, [$id]);
            return $req;
        }
    }
?>