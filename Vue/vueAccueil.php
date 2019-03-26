<?php ob_start(); ?>
<?php $title = 'Accueil Shrek 2' ?>

<form action="index.php?action=envoyer&id=" . $events['id']" method="post">
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
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php
    // Connexion à la base de données
    $reponse = $events;

    // Affichage de chaque commentaire (toutes les données sont protégées par htmlspecialchars)
    echo '<table><tr><th></th><th></th><th>Event name</th><th>Endroit</th><th>Personnage</th><th>Description</th><th>Autres détails</th></tr>';
    while ($donnees = $reponse->fetch())
    {
        echo '<tr><td><a href="index.php?action=modifier&id=' . $donnees['id'] . '">[modifier]</a></td><td><a href="index.php?action=supprimer&id=' . 
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

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>