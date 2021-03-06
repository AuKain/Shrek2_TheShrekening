<?php

    require_once 'Framework/Modele.php';

    class Player extends Modele {

        // Renvoie les informations sur un player
        public function getPlayer($idPlayer) {
            $sql = 'SELECT player_id as "id", name, courriel, gender, number_of_legs, photo, other_player_details from Players where player_id = ?';
            $player = $this->executerRequete($sql, [$idPlayer]);

            if ($player->rowCount() == 1)
                return $player->fetch();  // Accès à la première ligne de résultat
            else
                throw new Exception("Aucun article ne correspond à l'identifiant '$idPlayer'");
        }


        // Renvoie la liste de tous les players
        public function getPlayers() {
            $sql = 'SELECT player_id as "id", name, courriel, gender, number_of_legs, photo, other_player_details from Players order by player_id';
            $players = $this->executerRequete($sql);
            return $players;
        }

        public function modifierPlayer($player) {
            if (isset($player['id'])) {
                if ($player['id'] != 0) {
                    
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
            $fichierphoto = $this->enregistrerImage($ajout['photo']);
            $sql = 'INSERT INTO Players (name, courriel, gender, number_of_legs, photo, other_player_details) VALUES(?, ?, ?, ?, ?, ?)';
            $ajouts = $this->executerRequete($sql, [$ajout['name'], $ajout['courriel'], $ajout['gender'], $ajout['number_of_legs'], $fichierphoto, $ajout['other_player_details']]);
            return $ajouts;
        }

        public function supprimerPlayer($id) {
            $sql = 'DELETE from Players where player_id=?';
            $req = $this->executerRequete($sql, [$id]);
            return $req;
        }

        private function enregistrerImage($image) {
            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            if (isset($image) && $image['error'] == 0) {
                // Testons si le fichier n'est pas trop gros
                $dimension = $image['size'];
                if ($dimension <= 1000000) {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($image['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        // On peut valider le fichier et le stocker définitivement
                        $fichierImage = 'Contenu/Images/' . basename($image['name']);
                        move_uploaded_file($image['tmp_name'], $fichierImage);
                        return basename($image['name']);
                    } else {
                        throw new Exception("L'extension '$extension_upload' n'est pas autorisée pour les images");
                    }
                } else {
                    throw new Exception("Votre image ($dimension octets) dépasse la dimension autorisée (1000000 octets)");
                }
            } else {
                throw new Exception("Erreur rencontrée lors de la transmission du fichier");
            }
        }
    }
?>