<?php

require_once 'Vue/Vue.php';

$player = [
    'id' => '996',
    'name' => 'test nom',
    'courriel' => 'test courriel',
    'gender' => 'F',
    'number_of_legs' => '42',
    'other_player_details' => 'aaaaa'
];

$vue = new Vue('ModifierPlayer');
$vue->generer(['player' => $player]);