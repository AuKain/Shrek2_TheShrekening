<?php
    ob_start();
    $title = 'Modifier le script de Shrek 2';

    // Affichage du message à modifer (toutes les données externes sont protégées par htmlspecialchars)
    $donnees = getEvent($_GET['id']);
?>


<form action="Controleur\modifier.php" method="post">
    <h2>Modifier les événements du film!</h2>
    <p>
        <label for="event">Événement</label> : <input type="text" name="event" id="event" value="<?php echo htmlspecialchars($donnees['event_name']); ?>" /><br />
        <label for="place">Endroit</label> : 
            <select id="place" name="place" >
                <option value="1" <?php if ($donnees['place_name'] == 'Marais') echo 'Selected' ?>>Marais</option>
                <option value="2" <?php if ($donnees['place_name'] == 'Château') echo 'Selected' ?>>Château</option>
                <option value="3" <?php if ($donnees['place_name'] == 'Forêt') echo 'Selected' ?>>Forêt</option>
                <option value="4" <?php if ($donnees['place_name'] == 'Far Far Away') echo 'Selected' ?>>Far Far Away</option>
            </select><br />
        <label for="player">Personnage</label> : 
            <select id="player" name="player" >
                <option value="1" <?php if ($donnees['player_name'] == 'Fiona') echo 'Selected' ?>>Fiona</option>
                <option value="2" <?php if ($donnees['player_name'] == 'Shrek') echo 'Selected' ?>>Shrek</option>
                <option value="3" <?php if ($donnees['player_name'] == 'Donkey') echo 'Selected' ?>>Donkey</option>
                <option value="4" <?php if ($donnees['player_name'] == 'Puss in boots') echo 'Selected' ?>>Puss in boots</option>
                <option value="5" <?php if ($donnees['player_name'] == 'Prince Charming') echo 'Selected' ?>>Prince Charming</option>
                <option value="6" <?php if ($donnees['player_name'] == 'Dragon') echo 'Selected' ?>>Dragon</option>
            </select><br />
        <label for="description">Description</label> : <textarea type="text" name="description" id="description" ><?php echo htmlspecialchars($donnees['description']); ?></textarea> <br />
        <label for="other_info">Autres détails</label> : <textarea type="text" name="other_info" id="other_info" ><?php echo htmlspecialchars($donnees['other_details']); ?></textarea><br />
        <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
        <input type="submit" value="Envoyer" /><br />
        <a href="index.php">Annuler les modifications</a>
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>