<?php

require_once 'Vue/Vue.php';

$player = [
    'id' => '666',
    'name' => 'test nom',
    'courriel' => 'test courriel',
    'gender' => 'F',
    'number_of_legs' => '42',
    'other_player_details' => 'TESSSST'
];

$vue = new Vue("Confirmation");
$vue->generer(['donnee' => $player, 'type' => 'Player']);

?>