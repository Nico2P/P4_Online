<?php
$this->titre = "Administration du blog" ?>

<div id="vue_modif">
    <h2 class="securearea-title">Administration</h2>
    <div id="login_destroy">
        <p><a id="deconnexion" href="connexion/deconnecter" class="btn btn-info btn-lg">Se déconnecter</a></p>
    </div>

    <h2 class="securearea-title">Modifier un Article</h2>


    <form method="post" action="admin/update" class="securearea-title">
        <div id="editeur">
            <input type="hidden" name="id" value="<?=$article['id'] ?>" />
            <input id="titreArt" name="titre" type="text" value="<?= $this->nettoyer($article['titre'])?>" required/><br/>
            <textarea id="txtArticle" class="txt_zone_admin" name="contenu" placeholder=""><?= $this->nettoyer($article['contenu']) ?></textarea>
        </div>
        <p><input class="ajouter" type="submit" value="Modifier"/></p>
    </form>
</div>

<script src=" <?= $host . "public/tinymce/js/tinymce/tinymce.min.js"?>"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        plugins: "image"
    });
</script>

