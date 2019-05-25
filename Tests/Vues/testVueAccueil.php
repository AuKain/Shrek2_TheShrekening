<?php

require_once 'Framework/Vue.php';
require_once 'Framework/Requete.php';

$events = [
    [
        'id' => '991',
        'place_id' => '992',
        'player_id' => '993',
        'name' => 'un test',
        'place_name' => 'le test',
        'player_name' => 'le teste',
        'description' => 'desrc testée',
        'other_details' => 'autres tests'
    ]
];

$places = [
    [
        'place_id' => '992',
        'place_name' => 'titre Test 2',
        'place_description' => 'sous-titre Test 2',
        'other_place_details' => 'tesssst'
    ]
];

$players = [
    [
        'id' => '993',
        'name' => 'test nom',
        'courriel' => 'test courriel',
        'gender' => 'F',
        'photo' => 'test.gif',
        'number_of_legs' => '42',
        'other_player_details' => 'aaaaa'
    ]
];

$vue = new Vue('index', 'AdminEvents');
$vue->generer(['events' => $events, 'places' => $places, 'players' => $players], new Requete('test'));