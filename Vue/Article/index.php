<?php

/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 21/08/2017
 * Time: 15:23
 */


$this->titre = $this->nettoyer($article['titre']); ?>
<div id="vue_article">
<article>
    <header>
        <h2 class="titreArticle"><?= $this->nettoyer($article['titre'])?></h2>
        <time datetime="2017-10-26T10:40:10"><?= substr($this->nettoyer($article['date']), 5, 20) ?></time>
    </header>
    <p><?= $article['contenu'] ?></p>
</article>
</div>

<a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>">Retour à la page précédente</a>

<hr/>

<header>
    <h2 id="commentaireArticle"> Commentaires sur : <?= $this->nettoyer($article['titre']) ?></h2>
</header>
<?php foreach ($commentaires as $commentaire) : ?>
    <div class="commentaire">
    <p><?= $this->nettoyer(htmlspecialchars($commentaire['auteur'])) ?> a dit :</p>
    <p><?= $this->nettoyer(htmlspecialchars($commentaire['contenu'])) ?></p>

<form method="post" action="article/reported">
    <input name="id_com" type="hidden"  value="<?=$commentaire['id'] ?>" />
    <input name="id_art" type="hidden"  value="<?=$article['id'] ?>" />
    <input type="submit"  class="btn btn-info btn-lg" value="Signalez le commentaire" onclick="return(confirm('Commentaire signalez !'));"/>
</form>
    </div>

<?php endforeach; ?>

<hr />

<form method="post" action="article/comment">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required/><br/>
    <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire (120 characters maximum)"  maxlength="120" required></textarea><br/>
    <input type="hidden" name="id" value="<?=$article['id'] ?>" />
    <input type="submit" class="btn btn-info btn-lg" value="Commenter"/>
</form>


