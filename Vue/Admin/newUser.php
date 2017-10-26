<?php
$this->titre = "Administration du blog" ?>

<h2 class="securearea-title">Administration</h2>


<h2 class="securearea-title"> Ajout d'un utilisateur</h2>

<form method="post" action="admin/addUser" class="securearea-title">
    <div>
        <input id="pseudo" name="pseudo" type="text" placeholder="Pseudo" required/><br/>
        <input id="mdp" name="mdp" placeholder="Mot de passe" required type="password"></input>
    </div>
    <p><input type="submit" value="Ajouter Utilisateur"/></p>
</form>
