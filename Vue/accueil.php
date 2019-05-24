<?php 
    $this->titre = 'Accueil Shrek 2';
    
    echo '<h2>Les événements du film Shrek 2</h2>';
    // Affichage de chaque commentaire (toutes les données sont protégées par htmlspecialchars)
    echo '<table><tr><th></th><th></th><th>Nom de l\'événement</th><th>Endroit</th><th>Personnage</th><th>Description</th><th>Autres détails</th></tr>';
    foreach ($events as $event)
    {
        echo '<tr><td><a href="index.php?controleur=Event&action=modifier&id=' . $this->nettoyer($event['id']) . '">[modifier]</a></td><td><a href="index.php?controleur=Event&action=confirmer&id=' . 
            $this->nettoyer($event['id']) . '">[supprimer]</a></td><td>' .
            htmlspecialchars($this->nettoyer($event['name'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($event['place_name'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($event['player_name'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($event['description'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($event['other_details'])) . '</td></tr>';
    }

    echo '</table>';
?>
<h4>Oh non! J'ai supprimé un événement du meilleur film ever par accident... <a href="index.php?controleur=Event&action=retablir">Le rétablir?</a></h4><br/>

<?php 
    echo '<h2>Les personnnages du film Shrek 2</h2>';

    echo '<table><tr><th></th><th></th><th>Nom</th><th>Courriel</th><th>Genre</th><th>Jambes</th><th>Autres détails</th></tr>';
    foreach ($players as $player)
    {
        echo '<tr><td><a href="index.php?controleur=Player&action=modifier&id=' . $this->nettoyer($player['id']) . '">[modifier]</a></td><td><a href="index.php?controleur=Player&action=confirmer&id=' . 
            $this->nettoyer($player['id']) . '">[supprimer]</a></td><td>' .
            htmlspecialchars($this->nettoyer($player['name'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($player['courriel'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($player['gender'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($player['number_of_legs'])) . '</td><td>' . 
            htmlspecialchars($this->nettoyer($player['other_player_details'])) . '</td></tr>';
    }

    echo '</table>';
?>

<form action="index.php?controleur=Event&action=ajouter" method="post">
    <h2>Ajouter un événement au film Shrek 2!</h2>
    <p>
        <label for="event">Événement</label> : <input type="text" name="event" id="event" /><br/>
        <label for="place">Endroit</label> : 
            <select id="place" name="place" >
            <?php
                foreach ($places as $place)
                {
                    echo '<option value="' . htmlspecialchars($this->nettoyer($place['place_id'])) . '">' . 
                    htmlspecialchars($this->nettoyer($place['place_name'])) . '</option>';
                }
            ?>
            </select><br/>
        <label for="player">Personnage</label> : 
            <select id="player" name="player" >
            <?php
                foreach ($players as $player)
                {
                    echo '<option value="' . htmlspecialchars($this->nettoyer($player['id'])) . '" >' . 
                    htmlspecialchars($this->nettoyer($player['name'])) . '</option>';
                }
            ?>
            </select><br/>
        <label for="description">Description</label> : <textarea type="text" name="description" id="description" >Description de la scène</textarea><br/>
        <label for="other_info">Autres détails</label> : <textarea type="text" name="other_info" id="other_info" >Autres détails ici</textarea><br/>
        <input type="submit" value="Envoyer" /><br/>
    </p>
</form>

<form action="index.php?controleur=Player&action=ajouter" method="post">
    <h2>Ajouter un personnage au film Shrek 2!</h2>
    <p>
        <label for="name">Personnage</label> : <input class="ui-autocomplete-input" type="text" name="name" id="auto" /> <br/>
        <label for="courriel">Adresse courriel</label> : <input type="text" name="courriel" id="courriel" value="exemple@domaine.com" /><br/>
        <label for="gender">Genre</label> : 
            <select id="gender" name="gender" >
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select><br/>
        <label for="number_of_legs">Nombre de jambes</label> : <input type="text" name="number_of_legs" id="number_of_legs" value="2" /><br/>
        <label for="other_player_details">Autres détails</label> : <textarea type="text" name="other_player_details" id="other_player_details" >Autres détails ici</textarea><br/>
        <input type="hidden" name="table" value="Player" />
        <input type="submit" value="Envoyer" /><br/>
    </p>
</form>