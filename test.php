<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleEvent') {
        require 'Tests/Modeles/testEvent.php';
    } else if ($_GET['test'] == 'modelePlayer') {
        require 'Tests/Modeles/testPlayer.php';
    } else if ($_GET['test'] == 'modelePlace') {
        require 'Tests/Modeles/testPlace.php';

    } else if ($_GET['test'] == 'vueAccueil') {
        require 'Tests/Vues/testVueAccueil.php';
    } else if ($_GET['test'] == 'vueModifierEvent') {
        require 'Tests/Vues/testVueModifierEvent.php';
    } else if ($_GET['test'] == 'vueModifierPlayer') {
        require 'Tests/Vues/testVueModifierPlayer.php';
    } else if ($_GET['test'] == 'vueConfirmation') {
        require 'Tests/Vues/testVueConfirmation.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else if ($_GET['test'] == 'vueRetablir') {
        require 'Tests/Vues/testVueRetablir.php';
        
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
    <li>
        <a href="test.php?test=modelePlace">Place</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="test.php?test=vueAccueil">Accueil</a>
    </li>
    <li>
        <a href="test.php?test=vueModifierEvent">Modification d'événement</a>
    </li>
    <li>
        <a href="test.php?test=vueModifierPlayer">Modification d'acteur</a>
    </li>
    <li>
        <a href="test.php?test=vueConfirmation">Confirmation</a>
    </li>
    <li>
        <a href="test.php?test=vueRetablir">Rétablir</a>
    </li>
    <li>
        <a href="test.php?test=vueErreur">Erreur</a>
    </li>
</ul>