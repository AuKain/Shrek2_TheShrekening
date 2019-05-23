<?php

require_once 'Modele/Player.php';

$tstPlayer = new Player;
$players = $tstPlayer->getPlayers();
echo '<h3>Test getPlayers : </h3>';
var_dump($players->rowCount());

echo '<h3>Test getPlayer : </h3>';
$player =  $tstPlayer->getPlayer(1);
var_dump($player);

?>