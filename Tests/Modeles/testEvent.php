<?php

require_once 'Modele/Event.php';

$tstEvent = new Event;
$events = $tstEvent->getEvents();
echo '<h3>Test getEvents : </h3>';
var_dump($events->rowCount());

echo '<h3>Test getEvent : </h3>';
$event =  $tstEvent->getEvent(1);
var_dump($event);

?>