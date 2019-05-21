<?php

    require_once 'Framework/Modele.php';

    class Place extends Modele {
        // Renvoie les informations sur une place
        public function getPlace($idPlace) {
            $sql = 'SELECT * from Place where place_id = ?';
            $place = $this->executerRequete($sql, [$idPlace]);

            if ($event->rowCount() == 1)
                return $place->fetch();  // Accès à la première ligne de résultat
            else
                throw new Exception("Aucun article ne correspond à l'identifiant '$idPlace'");
        }

        // Renvoie la liste de tous les places
        public function getPlaces() {
            $sql = 'SELECT * from Places order by place_id';
            $places = $this->executerRequete($sql);
            return $places;
        }
    }
?>