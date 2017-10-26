<!--
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 18/08/2017
 * Time: 14:30
 */
-->
<?php $this->titre = "Accueil"; ?>

<div class="container">

<div id="accueil" class="jumbotron">
    <h1 class="display-4">Jean Forteroche / Acteur, Ecrivain</h1>
    <p class="lead">Bienvenue sur le blog, dans un souhait d'inovation le roman sera publié par épisode sur ce site.</p>
</div>
</div>


<div id="list-chapitre" class="container">
    <?php foreach ($articles as $article):?>
    <div class="row">
        <div class="col">
                <article class="index">
                    <header>
                        <a href="<?= "article/index/" . $this->nettoyer($article['id_art']) ?>">
                            <h2 class="titreArticle"><?= $this->nettoyer($article['titre_art']) ?></h2>
                        </a>
                        <time datetime="2017-10-26T10:40:10"><?= substr($this->nettoyer($article['date_art']), 5, 20) ?></time>
                    </header>
                    <p><?= substr($article['contenu_art'],0 , 300) ?></p>
                </article>
        </div>
    </div>
    <?php endforeach; ?>
</div>