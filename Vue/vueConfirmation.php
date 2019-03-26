<?php 
    ob_start();
    $title = 'Suppression Shrek 2';
    $donnees = getEvent($_GET['id']); 
?>

<p>
    Êtes-vous certain de vouloir supprimer l'événement : 
    <strong><?= $donnees['event_name'] ?></strong> ?
</p>

<form action="Controleur\supprimer.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
    <input type="submit" value="Confirmer la suppression" /><br />
    <input type="hidden" name="table" value="<?php echo $table ?>" />
    <a href="index.php"><strong>Annuler la suppression</strong></a>
</form>
<br/ ><br/ >

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>