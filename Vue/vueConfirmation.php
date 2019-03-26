<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Shrek 2: The Suppression</title>
    </head>
    <body>
        <?php 
            $donnees = getEvent($_GET['id']); 
        ?>

        <p>
            Êtes-vous certain de vouloir supprimer l'événement : 
            <strong><?php echo $donnees['event_name']; ?></strong> ?
        </p>

        <form action="Controleur\supprimer.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
            <input type="submit" value="Confirmer la suppression" />
        </form>
        <a href="index.php"><strong>Annuler la suppression</strong></a>
        <br/ ><br/ >

    </body>
</html>