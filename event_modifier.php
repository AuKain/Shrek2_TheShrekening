<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier les événements du film</title>
    </head>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>


        <?php
// Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=shrek2;charset=utf8', 'root', 'mysql');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Récupération du message à modifier
        $reponse = $bdd->query('SELECT Events.event_id as "id", Places.place_id as "place_id", Players.player_id as "player_id", Events.event_name as "event_name", Places.place_name as "place_name", Players.name as "player_name", Events.event_description as "description", Events.other_event_details as "other_details" from Events left join Places on Events.place_id=Places.place_id left join Players on Events.player_id=Players.player_id where Events.event_id = ' . $_GET['id']);

// Affichage du message à modifer (toutes les données externes sont protégées par htmlspecialchars)
        $donnees = $reponse->fetch();
        $reponse->closeCursor();
        ?>


        <form action="event_mise_a_jour.php" method="post">
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
    </body>
</html>