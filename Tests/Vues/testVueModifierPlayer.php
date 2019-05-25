<?php

require_once 'Framework/Vue.php';
require_once 'Framework/Requete.php';

$player = [
    'id' => '996',
    'name' => 'test nom',
    'courriel' => 'test courriel',
    'gender' => 'F',
    'number_of_legs' => '42',
    'other_player_details' => 'aaaaa'
];

$vue = new Vue('modifier', 'AdminPlayers');
$vue->generer(['player' => $player], new Requete('test'));