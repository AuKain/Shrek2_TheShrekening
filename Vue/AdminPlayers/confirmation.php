<?php 
    $this->titre = 'Suppression Shrek 2';
?>

<p>
    Êtes-vous certain de vouloir supprimer le personnage : <strong><?= $donnee['name'] ?> </strong> ?
</p>

<form action="index.php?controleur=AdminPlayer&action=supprimer" method="post">
    <input type="hidden" name="id" value="<?=$donnee['id']?>" />
    <input type="submit" value="Confirmer la suppression" /><br/>
    <a href="index.php"><strong>Annuler la suppression</strong></a>
</form>
<br/><br/>