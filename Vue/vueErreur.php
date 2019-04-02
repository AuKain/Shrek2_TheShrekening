<?php ob_start() ?>
<?php $titre = 'Erreur'; ?>

<p>Une erreur est survenue : <?= $msgErreur ?></p>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>