<?php
    ob_start();
    $titre = 'Modifier le script de Shrek 2';

    // Affichage du message à modifer (toutes les données externes sont protégées par htmlspecialchars)
    $donnees = getEvent($_GET['id']);
?>


<form action="Controleur\modifier.php" method="post">
    <h2>Modifier les événements du film!</h2>
    <p>
        <label for="event">Événement</label> : <input type="text" name="event" id="event" value="<?php echo htmlspecialchars($donnees['event_name']); ?>" /><br />
        <label for="place">Endroit</label> : 
            <select id="place" name="place" >

                <?php
                    $reponsePlaces = getPlaces();

                    while ($places = $reponsePlaces->fetch())
                    {
                        echo '<option value="' . htmlspecialchars($places['place_id']) . '" ';
                        if ($donnees['place_name'] == $places['place_name']) echo 'Selected';
                        echo ' >' . htmlspecialchars($places['place_name']) . '</option>';
                    }
                    $reponsePlaces->closeCursor();
                ?>

            </select><br />
        <label for="player">Personnage</label> : 
            <select id="player" name="player" >
                <?php 
                    $reponsePlayers = getPlayers();

                    while ($players = $reponsePlayers->fetch())
                    {
                        echo '<option value="' . htmlspecialchars($players['player_id']) . '" ';
                        if ($donnees['player_name'] == $players['name']) echo 'Selected';
                        echo ' >' . htmlspecialchars($players['name']) . '</option>';
                    }
                    $reponsePlayers->closeCursor();
                ?>
            </select><br />
        <label for="description">Description</label> : <textarea type="text" name="description" id="description" ><?php echo htmlspecialchars($donnees['description']); ?></textarea> <br />
        <label for="other_info">Autres détails</label> : <textarea type="text" name="other_info" id="other_info" ><?php echo htmlspecialchars($donnees['other_details']); ?></textarea><br />
        <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
        <input type="hidden" name="table" value="Event" />
        <input type="submit" value="Envoyer" /><br />
        <a href="index.php">Annuler les modifications</a>
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>