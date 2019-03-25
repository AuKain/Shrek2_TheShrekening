<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=shrek2;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Préparation de la case à cocher
// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE Events SET event_name = ?, place_id = ?, player_id = ?, event_description = ?, other_event_details = ? WHERE event_id = ?');
$req->execute(array($_POST['event'], $_POST['place'], $_POST['player'], $_POST['description'], $_POST['other_info'], $_POST['id']));

// Redirection du visiteur vers la page d'accueil du Blogue
// En commentaire si déboguage
header('Location: index.php');
?>
<!-- Pour déboguage -->
<html>
    <body>
		<h2>Mettre à jour un Shrek 2 V0.0.3</h2>
        <form action="index.php">
            *** Pour déboguage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
            <?php var_dump($_POST); ?>
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>