<?php 
    $this->titre = 'rétablir Shrek 2';
    
    echo '<h2>Purgatoire des scènes coupées du film Shrek 2...</h2>';
    // Affichage de chaque commentaire (toutes les données sont protégées par htmlspecialchars)
    echo '<table><tr><th></th><th>Nom de l\'événement</th><th>Endroit</th><th>Personnage</th><th>Description</th><th>Autres détails</th></tr>';
    foreach ($events as $event)
    {
        echo '<tr></td><td><a href="index.php?controleur=Event&action=revivre&id=' . $this->nettoyer($event['id']) . '">[rétablir!]</a></td><td>' .
            $this->nettoyer($event['name']) . '</td><td>' . 
            $this->nettoyer($event['place_name']) . '</td><td>' . 
            $this->nettoyer($event['player_name']) . '</td><td>' . 
            $this->nettoyer($event['description']) . '</td><td>' . 
            $this->nettoyer($event['other_details']) . '</td></tr>';
    }

    echo '</table>';
?>