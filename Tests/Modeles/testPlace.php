<?php

require_once 'Modele/Place.php';

$tstPlace = new Place;
$places = $tstPlace->getPlaces();
echo '<h3>Test getPlaces : </h3>';
var_dump($places->rowCount());

echo '<h3>Test getPlace : </h3>';
$place =  $tstPlace->getPlace(1);
var_dump($place);

?>