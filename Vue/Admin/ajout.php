<?php
$this->titre = "Administration du blog" ?>

<div id="bloc_ajout">
    <h2 class="securearea-title">Administration</h2>

    <div id="login_destroy">
        <p><a id="deconnexion" href="connexion/deconnecter" class="btn btn-info btn-lg">Se déconnecter</a></p>
    </div>



    <h2 class="securearea-title"> Ajout d'un article</h2>
    <div id="bloc_edit" class="col-md-10">
        <form method="post" action="admin/ajouter" class="securearea-title">
            <div id="editeur">
                <input id="titreArt"  name="titre" type="text" placeholder="Titre de l'article" required/><br/>
                <textarea id="txtArticle" class="txt_zone_admin" name="contenu" placeholder=""></textarea>
            </div>
            <p>
                <input class="ajouter" type="submit" value="Ajouter"/>
            </p>
        </form>
    </div>
</div>


<script src=" <?= $host . "public/tinymce/js/tinymce/tinymce.min.js"?>"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        plugins: "image"
    });
</script>