<?php

    require_once 'Framework/Modele.php';

    class Player extends Modele {

        // Recherche les persos répondant à l'autocomplete
        public function searchPerso($term) {
            $sql = 'SELECT perso_nom FROM Personnages WHERE perso_nom LIKE :term';
            $stmt = $this->executerRequete($sql, ['term' => '%' . $term . '%']);

            while ($row = $stmt->fetch()) {
                $return_arr[] = $row['perso_nom'];
            }

            /* Toss back results as json encoded array. */
            return json_encode($return_arr);
        }
    }
?>