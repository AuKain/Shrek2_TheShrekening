<?php $this->titre = "Shrek 2 - conección" ?>

<p>Vous devez être connecté pour accéder à cette zone.</p>

<form action="index.php?controleur=Utilisateurs&action=connecter" method="post">
    <input name="login" type="text" placeholder="Entrez votre login" required autofocus>
    <input name="mdp" type="password" placeholder="Entrez votre mot de passe" required>
    <button type="submit">Connexion</button>
</form>

<?= ($erreur == 'connexion') ? '<span style="color : red;">Login ou mot de passe incorrects</span>' : '' ?> 
