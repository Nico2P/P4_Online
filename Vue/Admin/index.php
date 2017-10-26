<?php
$this->titre = "Administration du blog" ?>

    <div id="blog_admin">
    <h2 class="securearea-title">Administration</h2>

    <div id="login_destroy">
        <p>Bienvenue, <?= $this->nettoyer($login) ?> !</p>
        <p><a id="deconnexion" href="connexion/deconnecter" class="btn btn-info btn-lg">Se déconnecter</a></p>
    </div>

    <div id="infoblog">
        Le blog comporte
        <?= $this->nettoyer($nbArticles) ?> article(s) et
        <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
    </div>
    <br/>

    <div id="btn_ajout">
    <a href="<?= "admin/ajout"?>" class="btn btn-info btn-lg">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ajouter un article
    </a>
    </div>

    <h2 class="securearea-title">Moderation des commentaires :</h2>
    <br/>
    <div class="table-responsive">
        <table class="table table-striped" id="tabcommentaires">
            <tr>
                <th>Auteur</th>
                <th>Contenu</th>
                <th>Action</th>
            </tr>
            <?php if (!empty($listreport)): ?>
                <?php foreach ($listreport as $comment_report):?>
                    <tr>
                        <td class="auteur_com"><?= $comment_report["auteur"] ?></td>
                        <td class="contenu_com"><?= $comment_report["contenu"] ?></td>
                        <td class="btn-tab action_com">
                            <a href="<?= "admin/suppCommentaire/" . $comment_report["id"]?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));" class="btn btn-info btn-lg"><i class="fa fa-trash" aria-hidden="true"></i>Supprimé</a>
                            <a href="<?= "admin/notReport/" . $comment_report["id"]?>" onclick="return(confirm('Ne plus signalez le commentaire ?'));" class="btn btn-info btn-lg"><i class="fa fa-check" aria-hidden="true"></i>Validez</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else:?>
                <tr>
                    <p>Aucun Commentaire signalez</p>
                </tr>
                <?php endif; ?>
        </table>
    </div>

<hr/>

    <h2 class="securearea-title">Liste des articles :</h2>
    <div class="table-responsive">
    <table id="tabadmin" class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th class="contenu_art">Contenu</th>
            <th>Action</th>
        </tr>
        <?php foreach ($articles as $article):?>
        <tr class="lgn-tab">
            <td class="id_art"><a href="<?= "article/index/" . $this->nettoyer($article['id_art']) ?>"><?= $this->nettoyer($article['id_art']) ?></a></td>
            <td class="titre_art"><p class="titreArticle"><?= $this->nettoyer($article['titre_art']) ?></p></td>
            <td class="ctn-art"><p><?= substr($article['contenu_art'],0 , 150) ?>...</p></td>
            <td class="btn-tab">
                <a href="<?= "admin/modifier/". $this->nettoyer($article['id_art']) ?>" class="btn btn-info btn-lg">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modifier
                </a>
                <a href="<?= "admin/supprimer/". $this->nettoyer($article['id_art']) ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));" class="btn btn-info btn-lg">
                    <i class="fa fa-trash" aria-hidden="true"></i> Supprimer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>


    <p>Fonction supplementaire :<a id="addUser" href="admin/newUser">Ajouter un utilisateur</a></p>
    </div>

<div id="w3c">
    <p>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://www.sanjaywebdesigner.com/articles/wp-content/uploads/2014/07/html5-courses.png" alt="HTML Valide !" />
        </a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valide !" />
        </a>
    </p>
</div>




