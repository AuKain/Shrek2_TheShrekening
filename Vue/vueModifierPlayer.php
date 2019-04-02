<?php
    ob_start();
    $titre = 'Modifier le script de Shrek 2';

    // Affichage du message à modifer (toutes les données externes sont protégées par htmlspecialchars)
    $donnees = getPlayer($_GET['id']);
?>


<form action="Controleur\modifier.php" method="post">
    <h2>Modifier les personnages du film!</h2>
    <p>
        <label for="name">Personnage</label> : <input type="text" name="name" id="auto" value="<?= htmlspecialchars($donnees['name']); ?>" /> <br />
        <label for="courriel">Adresse courriel</label> : <input type="text" name="courriel" id="courriel" value="<?= htmlspecialchars($donnees['courriel']); ?>" /><br />
        <label for="gender">Genre</label> : 
            <select id="gender" name="gender" >
                <option value="M" <?php if($donnees['gender'] == 'M') echo 'Selected' ?> >Homme</option>
                <option value="F" <?php if($donnees['gender'] == 'F') echo 'Selected' ?> >Femme</option>
            </select><br />
        <label for="number_of_legs">Nombre de jambes</label> : <input type="text" name="number_of_legs" id="number_of_legs" value="<?= htmlspecialchars($donnees['number_of_legs']); ?>" /><br />
        <label for="other_player_details">Autres détails</label> : <textarea type="text" name="other_player_details" id="other_player_details" ><?= htmlspecialchars($donnees['other_player_details']) ?></textarea><br />
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
        <input type="hidden" name="table" value="Player" />
        <input type="submit" value="Envoyer" /><br />
        <a href="index.php">Annuler les modifications</a>
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>