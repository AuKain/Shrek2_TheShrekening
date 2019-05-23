<?php

    require_once 'Controleur/ControleurEvent.php';
    require_once 'Controleur/ControleurPersonnage.php';
    require_once 'Controleur/ControleurPlace.php';
    require_once 'Controleur/ControleurPlayer.php';
    require_once 'Vue/Vue.php';

    class Routeur {

        private $ctrlEvent;
        private $ctrlPlayer;
        private $ctrlPlace;
        private $ctrlPersonnage;

        public function __construct(){
            $this->ctrlEvent = new ControleurEvent();
            $this->ctrlPlayer = new ControleurPlayer();
            $this->ctrlPlace = new ControleurPlace();
            $this->ctrlPersonnage = new ControleurPersonnage();
        }

        public function routerRequete() {
            try {
                if (isset($_GET['action'])) {
            
                    // ajouter un événement
                    if ($_GET['action'] == 'envoyerEvent') {
            
                        $this->ctrlEvent->ajouter($_POST);
                        header("location:index.php");
            
                        // modifier un événement
                    } else if ($_GET['action'] == 'modifierEvent') {
            
                        $id = intval($this->getParametre($_GET, 'id' ));
                        if ($id != 0) {
                                $this->ctrlEvent->modifier($id);

                            } else
                                throw new Exception("Identifiant d'événement incorrect");

                    } else if ($_GET['action'] == 'majEvent') {

                        if ($_POST['id'] != 0) {
                                $this->ctrlEvent->mettreAJour($_POST);
                                header("location:index.php");

                            } else
                                throw new Exception("Identifiant d'événement incorrect");

                        // supprimer un événement
                    } else if ($_GET['action'] == 'confirmerEvent') {
            
                        $id = intval($this->getParametre($_GET, 'id' ));
                        if ($id != 0) {
                            $this->ctrlEvent->confirmer($id);

                        } else
                            throw new Exception("Identifiant d'événement incorrect");
                    
                    } else if ($_GET['action'] == 'supprimerEvent') {
        
                        $id = intval($this->getParametre($_POST, 'id' ));
                        if ($id != 0) {
                            $this->ctrlEvent->supprimer($id);
                            header("location:index.php");

                        } else
                            throw new Exception("Identifiant d'événement incorrect");
            
                    } else if ($_GET['action'] == 'envoyerPlayer') {
            
                        $this->ctrlPlayer->ajouter($_POST);
                        header("location:index.php");
                        
                    } else if ($_GET['action'] == 'modifierPlayer') {
            
                        $id = intval($this->getParametre($_GET, 'id' ));
                        if ($id != 0) {
                                $this->ctrlPlayer->modifier($id);

                            } else
                                throw new Exception("Identifiant d'acteur incorrect");

                    } else if ($_GET['action'] == 'majPlayer') {
    
                        if ($_POST['id'] != 0) {
                                $this->ctrlPlayer->mettreAJour($_POST);
                                header("location:index.php");

                            } else
                                throw new Exception("Identifiant d'acteur incorrect");
            
                    } else if ($_GET['action'] == 'confirmerPlayer') {
            
                        $id = intval($this->getParametre($_GET, 'id' ));
                        if ($id != 0) {
                            $this->ctrlPlayer->confirmer($id);

                        } else
                            throw new Exception("Identifiant d'acteur incorrect");
                    
                    } else if ($_GET['action'] == 'supprimerPlayer') {
    
                        $id = intval($this->getParametre($_POST, 'id' ));
                        if ($id != 0) {
                            $this->ctrlPlayer->supprimer($id);
                            header("location:index.php");

                        } else
                            throw new Exception("Identifiant d'acteur incorrect");

                    } else if ($_GET['action'] == 'aPropos') {
                    
                        $vue = new Vue("Propos");
                        $vue->generer();

                    } else if ($_GET['action'] == 'quelsPersos') {
                        $this->ctrlPersonnage->quelsPersos($_GET['term']);
            
                    } else {
                        // Fin des actions
                        throw new Exception("Action non valide");
                    }
                } else {
                    $this->ctrlEvent->events();
                }
            } catch (Exception $e) {
                $this->erreur($e->getMessage());
            }
        }

        // Affiche une erreur
        private function erreur($msgErreur) {
            $vue = new Vue("Erreur");
            $vue->generer(array('msgErreur' => $msgErreur));
        }

        // Recherche un paramètre dans un tableau
        private function getParametre($tableau, $nom) {
            if (isset($tableau[$nom])) {
                return $tableau[$nom];
            } else
                throw new Exception("Paramètre '$nom' absent");
        }
    }
?>