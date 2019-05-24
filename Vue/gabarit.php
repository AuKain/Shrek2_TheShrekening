<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre ?></title>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    </head>
    <style>
        form
        {
            text-align: center;
        }
        th, tr, td
        {
            text-align: left;
        }
        img
        {
            max-height: 40px;
        }
    </style>
    <body>
        <a href="index.php"><h1>Shrek 2 the Movie the Game the TP</h1></a><br/>
        <?= $contenu ?>
        <?php
            if ($titre != 'À propos de Shrek 2') {
                echo "<br/><a href=\"index.php?controleur=Propos\"><h3>~~À propos~~</h3></a>";
            }
        ?>
        <p>Réalisé avec PHP, HTML5 et CSS.</p>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="Contenu/autoComp.js"></script>
    </body>
</html>