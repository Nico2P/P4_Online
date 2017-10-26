<?php $this->titre = "Espace Admin" ?>

<div class="container admin">

    <h2 class="form-signin-heading securearea-title">Espace sécurisé</h2>

    <p class="securearea-title">Vous devez être connecté pour accéder à cette zone</p>


    <div id="label-connexion" class="container">

        <form action="connexion/connecter" method="post" class="form-signin">
            <label class="sr-only">Nom</label>
            <input id="inputName" name="login" class="form-control securearea-title" placeholder="Nom" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name="mdp" id="inputPassword" class="form-control securearea-title" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block securearea-title" id="connexion" type="submit">Connexion</button>
        </form>

    </div>


<div id="erreur">
<?php if (isset($msgErreur)): ?>
<p><?=$msgErreur ?> </p>
<?php endif; ?>
</div>


</div>