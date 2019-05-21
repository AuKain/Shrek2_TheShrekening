<?php

    require_once 'Framework/Modele.php';

    class Player extends Modele {

        // Renvoie les informations sur un player
        public function getPlayer($idPlayer) {
            $sql = 'SELECT * from Players where player_id = ?';
            $player = $this->executerRequete($sql, [$idPlayer]);

            if ($player->rowCount() == 1)
                return $player->fetch();  // Accès à la première ligne de résultat
            else
                throw new Exception("Aucun article ne correspond à l'identifiant '$idPlayer'");
        }


        // Renvoie la liste de tous les players
        public function getPlayers() {
            $sql = 'SELECT * from Players order by player_id';
            $players = $this->executerRequete($sql);
            return $players;
        }

        public function modifierPlayer($player) {//TODO A FAIRE TANTOT
            if (isset($player['id'])) {
                if ($id != 0) {
                    
                    $sql = 'UPDATE Players SET name = ?, courriel = ?, gender = ?, number_of_legs = ?, other_player_details = ? WHERE player_id = ?';
                    $req = $this->executerRequete($sql, [$player['name'], $player['courriel'], $player['gender'], $player['number_of_legs'], $player['other_player_details'], $player['id']]);
                    return $req;
                    
                } else
                    throw new Exception("Identifiant d'acteur incorrect");
            } else
                throw new Exception("Aucun identifiant d'acteur");
        }

        // Ajoute un personnage
        public function setPlayer($ajout) {
            $sql = 'INSERT INTO Players (name, courriel, gender, number_of_legs, other_player_details) VALUES(?, ?, ?, ?, ?)';
            $ajouts = $this->executerRequete($sql, [$ajout['name'], $ajout['courriel'], $ajout['gender'], $ajout['number_of_legs'], $ajout['other_player_details']]);
            return $ajouts;
        }

        public function supprimerPlayer($id) {
            $sql = 'DELETE from Players where player_id=?';
            $req = executerRequete($sql, [$id]);
            return $req;
        }
    }
?>