<?php

require_once 'Framework/Vue.php';

$events = [
    [
        'id' => '13',
        'place_id' => '15',
        'player_id' => '16',
        'name' => 'un test del',
        'place_name' => 'le test deleté',
        'player_name' => 'le testé delete',
        'description' => 'desrc testée',
        'other_details' => 'delet this'
    ]
];

$vue = new Vue('retablir', 'Events');
$vue->generer(['events' => $events]);