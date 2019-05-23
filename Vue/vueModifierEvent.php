<?php
    $this->titre = 'Modifier le script de Shrek 2';
?>

<form action="index.php?action=majEvent" method="post">
    <h2>Modifier les événements du film!</h2>
    <p>
        <label for="event">Événement</label> : <input type="text" name="event" id="event" value="<?php echo htmlspecialchars($event['name']); ?>" /><br/>
        <label for="place">Endroit</label> : 
            <select id="place" name="place" >
                <?php
                foreach ($places as $place)
                {
                    echo '<option value="' . htmlspecialchars($place['place_id']) . '" ';
                    if ($event['place_name'] == $place['place_name']) echo 'Selected';
                    echo ' >' . htmlspecialchars($place['place_name']) . '</option>';
                }
                ?>

            </select><br/>
        <label for="player">Personnage</label> : 
            <select id="player" name="player" >
            <?php
                foreach ($players as $player)
                {
                    echo '<option value="' . htmlspecialchars($player['id']) . '" ';
                    if ($event['player_name'] == $player['name']) echo 'Selected';
                    echo ' >' . htmlspecialchars($player['name']) . '</option>';
                }
                
            ?>
            </select><br/>
        <label for="description">Description</label> : <textarea type="text" name="description" id="description" ><?php echo htmlspecialchars($event['description']); ?></textarea><br/>
        <label for="other_info">Autres détails</label> : <textarea type="text" name="other_info" id="other_info" ><?php echo htmlspecialchars($event['other_details']); ?></textarea><br/>
        <input type="hidden" name="id" value="<?= htmlspecialchars($event['id']) ?>" />
        <input type="submit" value="Envoyer" /><br/>
        <a href="index.php">Annuler les modifications</a>
    </p>
</form>