<?php
    $this->titre = 'Modifier les personnages de Shrek 2';
?>

<h2>Modifier les personnages du film!</h2>
<form action="index.php?controleur=Player&action=mettreAJour" method="post">
    
    <p>
        <label for="name">Personnage : </label><input type="text" name="name" id="auto" value="<?= $this->nettoyer($player['name']); ?>" /><br/>
    </p>
    <p>
        <label for="courriel">Adresse courriel : </label><input type="text" name="courriel" id="courriel" value="<?= $this->nettoyer($player['courriel']); ?>" /><br/>
    </p>
    <p>
        <label for="gender">Genre : </label>
        <select id="gender" name="gender" >
            <option value="M" <?php if($this->nettoyer($player['gender']) == 'M') echo 'Selected' ?> >Homme</option>
            <option value="F" <?php if($this->nettoyer($player['gender']) == 'F') echo 'Selected' ?> >Femme</option>
        </select><br/>
    </p>
    <p>
        <label for="number_of_legs">Nombre de jambes : </label><input type="text" name="number_of_legs" id="number_of_legs" value="<?= $this->nettoyer($player['number_of_legs']); ?>" /><br/>
        </p>
    <p>
        <label for="other_player_details">Autres détails : </label><textarea type="text" name="other_player_details" id="other_player_details" ><?= $this->nettoyer($player['other_player_details']) ?></textarea><br/>
    </p>
        <input type="hidden" name="id" value="<?= $this->nettoyer($player['id']) ?>" />
    <p>
        <label></label><input type="submit" value="Envoyer" /><br/>
    </p>
        <label></label><a href="index.php">Annuler les modifications</a>
    </p>
</form>