<?php 
    ob_start();
    $titre = 'Accueil Shrek 2';
    $eventsDB = getEvents();
    $playersDB = getPlayers();
?>

<?php
    // Connexion à la base de données
    $reponse = getEvents();
    
    echo '<h2>Les événements du film Shrek 2</h2>';
    // Affichage de chaque commentaire (toutes les données sont protégées par htmlspecialchars)
    echo '<table><tr><th></th><th></th><th>Nom de l\'événement</th><th>Endroit</th><th>Personnage</th><th>Description</th><th>Autres détails</th></tr>';
    while ($donnees = $reponse->fetch())
    {
        echo '<tr><td><a href="index.php?action=modifierEvent&id=' . $donnees['id'] . '">[modifier]</a></td><td><a href="index.php?action=supprimerEvent&id=' . 
            $donnees['id'] . '">[supprimer]</a></td><td>' .
            htmlspecialchars($donnees['event_name']) . '</td><td>' . 
            htmlspecialchars($donnees['place_name']) . '</td><td>' . 
            htmlspecialchars($donnees['player_name']) . '</td><td>' . 
            htmlspecialchars($donnees['description']) . '</td><td>' . 
            htmlspecialchars($donnees['other_details']) . '</td></tr>';
    }

    echo '</table>';

    $reponse->closeCursor();

?>
<br />

<?php 
    $reponsePlayers = getPlayers();

    echo '<h2>Les personnnages du film Shrek 2</h2>';

    echo '<table><tr><th></th><th></th><th>Nom</th><th>Courriel</th><th>Genre</th><th>Jambes</th><th>Autres détails</th></tr>';
    while ($donnees = $reponsePlayers->fetch())
    {
        echo '<tr><td><a href="index.php?action=modifierPlayer&id=' . $donnees['player_id'] . '">[modifier]</a></td><td><a href="index.php?action=supprimerPlayer&id=' . 
            $donnees['player_id'] . '">[supprimer]</a></td><td>' .
            htmlspecialchars($donnees['name']) . '</td><td>' . 
            htmlspecialchars($donnees['courriel']) . '</td><td>' . 
            htmlspecialchars($donnees['gender']) . '</td><td>' . 
            htmlspecialchars($donnees['number_of_legs']) . '</td><td>' . 
            htmlspecialchars($donnees['other_player_details']) . '</td></tr>';
    }

    echo '</table>';

    $reponse->closeCursor();
?>

<form action="index.php?action=envoyerEvent&id=" . $eventsDB['id']" method="post">
    <h2>Ajouter un événement au film Shrek 2!</h2>
    <p>
        <label for="event">Événement</label> : <input type="text" name="event" id="event" /><br />
        <label for="place">Endroit</label> : 
            <select id="place" name="place" >
            <?php
                $reponsePlaces = getPlaces();

                while ($places = $reponsePlaces->fetch())
                {
                    echo '<option value="' . htmlspecialchars($places['place_id']) . '">' . 
                    htmlspecialchars($places['place_name']) . '</option>';
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
                    echo '<option value="' . htmlspecialchars($players['player_id']) . '" >' . 
                    htmlspecialchars($players['name']) . '</option>';
                }
                $reponsePlayers->closeCursor();
            ?>
            </select><br />
        <label for="description">Description</label> : <textarea type="text" name="description" id="description" >Description de la scène</textarea><br />
        <label for="other_info">Autres détails</label> : <textarea type="text" name="other_info" id="other_info" >Autres détails ici</textarea><br />
        <input type="hidden" name="table" value="Event" />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<form action="index.php?action=envoyerPlayer&id=" . $playersDB['id']" method="post">
    <h2>Ajouter un personnage au film Shrek 2!</h2>
    <p>
        <label for="name">Personnage</label> : <input type="text" name="name" id="name" /><br />
        <label for="courriel">Adresse courriel</label> : <input type="text" name="courriel" id="courriel" value="exemple@domaine.com" /><br />
        <label for="gender">Genre</label> : 
            <select id="gender" name="gender" >
                <option value="M">Homme</option>
                <option value="F">Femme</option>
            </select><br />
        <label for="number_of_legs">Nombre de jambes</label> : <input type="text" name="number_of_legs" id="number_of_legs" value="2" /><br />
        <label for="other_player_details">Autres détails</label> : <textarea type="text" name="other_player_details" id="other_player_details" >Autres détails ici</textarea><br />
        <input type="hidden" name="table" value="Player" />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>