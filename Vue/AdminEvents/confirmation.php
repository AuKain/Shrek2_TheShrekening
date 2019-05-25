<?php 
    $this->titre = 'Suppression Shrek 2';
?>

<p>
    Êtes-vous certain de vouloir supprimer l'événement : <strong><?= $this->nettoyer($donnee['name']) ?> </strong> ?
</p>

<form action="index.php?controleur=AdminEvent&action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $this->nettoyer($donnee['id']) ?>" />
    <input type="submit" value="Confirmer la suppression" /><br/>
    <a href="index.php"><strong>Annuler la suppression</strong></a>
</form>
<br/><br/>