<?php
    $this->titre = 'Modifier le script de Shrek 2';
?>

<form action="index.php?action=mettreAJour" method="post">
    <h2>Modifier les événements du film!</h2>
    <p>
        <label for="event">Événement</label> : <input type="text" name="event" id="event" value="<?php echo $this->nettoyer($event['name']); ?>" /><br/>
        <label for="place">Endroit</label> : 
            <select id="place" name="place" >
                <?php
                foreach ($places as $place)
                {
                    echo '<option value="' . $this->nettoyer($place['place_id'] . '" ';
                    if ($this->nettoyer($event['place_name']) == $this->nettoyer($place['place_name'])) echo 'Selected';
                    echo ' >' . $this->nettoyer($place['place_name'] . '</option>';
                }
                ?>

            </select><br/>
        <label for="player">Personnage</label> : 
            <select id="player" name="player" >
            <?php
                foreach ($players as $player)
                {
                    echo '<option value="' . $this->nettoyer($player['id']) . '" ';
                    if ($this->nettoyer($event['player_name']) == $this->nettoyer($player['name'])) echo 'Selected';
                    echo ' >' . $this->nettoyer($player['name']) . '</option>';
                }
                
            ?>
            </select><br/>
        <label for="description">Description</label> : <textarea type="text" name="description" id="description" ><?php echo $this->nettoyer($event['description']); ?></textarea><br/>
        <label for="other_info">Autres détails</label> : <textarea type="text" name="other_info" id="other_info" ><?php echo $this->nettoyer($event['other_details']); ?></textarea><br/>
        <input type="hidden" name="id" value="<?= $this->nettoyer($event['id']) ?>" />
        <input type="submit" value="Envoyer" /><br/>
        <a href="index.php">Annuler les modifications</a>
    </p>
</form>