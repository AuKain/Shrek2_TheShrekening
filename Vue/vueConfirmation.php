<?php 
    ob_start();
    $titre = 'Suppression Shrek 2';

    if ($table == 'Event') {
        $donnees = getEvent($_GET['id']);
    } else if ($table == 'Player') {
        $donnees = getPlayer($_GET['id']);
    }
    
?>

<p>
    Êtes-vous certain de vouloir supprimer l'événement : 
    <strong><?php if($table == 'Event') echo $donnees['event_name'] ?><?php if ($table == 'Player') echo $donnees['name'] ?> </strong> ?
</p>

<form action="Controleur\supprimer.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
    <input type="submit" value="Confirmer la suppression" /><br />
    <input type="hidden" name="table" value="<?= $table ?>" />
    <a href="index.php"><strong>Annuler la suppression</strong></a>
</form>
<br/ ><br/ >

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>