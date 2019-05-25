<?php

require_once 'Framework/Vue.php';
require_once 'Framework/Requete.php';

$vue = new Vue("Erreur");
$vue->generer(['msgErreur' => '*** Message d\'erreur test ***'], new Requete('test'));

?>