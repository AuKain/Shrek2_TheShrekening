<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Shrek 2 the Movie the Game the TP</title>
    </head>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>
    
        <form action="event_envoyer.php" method="post">
            <h2>Shrek 2 the Movie the Game the TP</h2>
            <p>
                <label for="event">Événement</label> : <input type="text" name="event" id="event" /><br />
                <label for="place">Endroit</label> : 
                    <select id="place" name="place" >
                        <option value="1">Marais</option>
                        <option value="2">Château</option>
                        <option value="3">Forêt</option>
                        <option value="4">Far Far Away</option>
                    </select><br />
                <label for="player">Personnage</label> : 
                    <select id="player" name="player" >
                        <option value="1">Fiona</option>
                        <option value="2">Shrek</option>
                        <option value="3">Donkey</option>
                        <option value="4">Puss in boots</option>
                        <option value="5">Prince Charming</option>
                        <option value="6">Dragon</option>
                    </select><br />
                <label for="description">Description</label> : <textarea type="text" name="description" id="description" >Description de la scène</textarea><br />
                <label for="other_info">Autres détails</label> : <textarea type="text" name="other_info" id="other_info" >Autres détails ici</textarea><br />
                <input type="submit" value="Envoyer" />
            </p>
        </form>

        <?php
            // Connexion à la base de données
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=shrek2;charset=utf8', 'root', 'mysql');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }

            // Récupération des 10 derniers commentaires
            $reponse = $bdd->query('SELECT Events.event_id as "id", Places.place_id as "place_id", Players.player_id as "player_id", Events.event_name as "event_name", Places.place_name as "place_name", Players.name as "player_name", Events.event_description as "description", Events.other_event_details as "other_details" from Events left join Places on Events.place_id=Places.place_id left join Players on Events.player_id=Players.player_id order by Events.event_id');

            // Affichage de chaque commentaire (toutes les données sont protégées par htmlspecialchars)
            echo '<table><tr><th></th><th></th><th>Event name</th><th>Endroit</th><th>Personnage</th><th>Description</th><th>Autres détails</th></tr>';
            while ($donnees = $reponse->fetch())
            {
                echo '<tr><td><a href="event_modifier.php?id=' . $donnees['id'] . '">[modifier]</a></td><td><a href="event_confirm.php?id=' . 
                    $donnees['id'] . '">[supprimer]</a></td><td>' .
                    htmlspecialchars($donnees['event_name']) . '</td><td>' . 
                    htmlspecialchars($donnees['place_name']) . '</td><td>' . 
                    htmlspecialchars($donnees['player_name']) . '</td><td>' . 
                    htmlspecialchars($donnees['description']) . '</td><td>' . 
                    htmlspecialchars($donnees['other_details']) . '</td></tr>';
                    
            }

            echo '</table><br /><a href=".\apropos.html">~~À propos~~</a>';

            $reponse->closeCursor();

        ?>
    </body>
</html>