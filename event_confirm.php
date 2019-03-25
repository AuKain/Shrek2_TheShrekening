<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Shrek 2 the Movie the Game the TP SUPPRESSED</title>
    </head>
    <style>
    form
    {
        text-align:left;
    }
    </style>
    <body>
        <form action="event_supprimer.php" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
            <input type="submit" value="Confirmer la suppression" />
        </form>
        <a href="index.php"><strong>Annuler la suppression</strong></a>
    </body>
</html>