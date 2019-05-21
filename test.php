<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleEvent') {
        require 'Tests/Modeles/testEvent.php';
    } else if ($_GET['test'] == 'modelePersonnage') {
        require 'Tests/Modeles/testPersonnage.php';
    } else if ($_GET['test'] == 'modelePlace') {
        require 'Tests/Modeles/testPlace.php';
    } else if ($_GET['test'] == 'modelePlayer') {
        require 'Tests/Modeles/testPlayer.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>

<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="test.php?test=modeleEvent">Event</a>
    </li>
    <li>
        <a href="test.php?test=modelePlayer">Player</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="test.php?test=vueArticles">Articles</a>
    </li>
    <li>
        <a href="test.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="test.php?test=vueErreur">Erreur</a>
    </li>
</ul>
