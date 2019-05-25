<?php 
    $this->titre = 'Accueil Shrek 2';
    
    echo '<h2>Les événements du film Shrek 2</h2>';
    // Affichage de chaque commentaire (toutes les données sont protégées par htmlspecialchars)
    echo '<table><tr><th>Nom de l\'événement</th><th>Endroit</th><th>Personnage</th><th>Description</th><th>Autres détails</th></tr>';
    foreach ($events as $event)
    {
        echo '<tr><td>' . $this->nettoyer($event['name']) . '</td><td>' . 
            $this->nettoyer($event['place_name']) . '</td><td>' . 
            $this->nettoyer($event['player_name']) . '</td><td>' . 
            $this->nettoyer($event['description']) . '</td><td>' . 
            $this->nettoyer($event['other_details']) . '</td></tr>';
    }

    echo '</table>';
?>
<h4>Oh non! J'ai supprimé un événement du meilleur film ever par accident... <a href="index.php?controleur=Event&action=retablir">Le rétablir?</a></h4><br/>

<?php 
    echo '<h2>Les personnnages du film Shrek 2</h2>';

    echo '<table><tr><th></th><th>Nom</th><th>Courriel</th><th>Genre</th><th>Jambes</th><th>Autres détails</th><th>Photo</th></tr>';
    foreach ($players as $player)
    {
        echo '<tr><td><a href="index.php?controleur=Player&action=modifier&id=' . $this->nettoyer($player['id']) . '">[modifier]</a></td><td>' .
            $this->nettoyer($player['name']) . '</td><td>' . 
            $this->nettoyer($player['courriel']) . '</td><td>' . 
            $this->nettoyer($player['gender']) . '</td><td>' . 
            $this->nettoyer($player['number_of_legs']) . '</td><td>' . 
            $this->nettoyer($player['other_player_details']) . '</td><td>';
            if ($this->nettoyer($player['photo']) != "") {
                echo '<img class="photo" src="' . $racineWeb . 'Contenu/Images/' . $this->nettoyer($player['photo']) . '">';
            }
            echo '</td></tr>';
            
    }

    echo '</table>';
?>