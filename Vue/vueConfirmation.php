<?php 
    $this->titre = 'Suppression Shrek 2';
?>

<p>
    Êtes-vous certain de vouloir supprimer <?= ($type == 'Player')? "le personnage" : "l'événement"?> : 
    <strong><?php echo $donnee['name'];?> </strong> ?
</p>

<form action="index.php?action=supprimer<?=$type?>" method="post">
    <input type="hidden" name="id" value="<?=$donnee['id']?>" />
    <input type="submit" value="Confirmer la suppression" /><br/>
    <a href="index.php"><strong>Annuler la suppression</strong></a>
</form>
<br/><br/>