<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 31/08/2017
 * Time: 16:43
 */

require_once 'Framework/Controleur.php';
require_once 'Model/ArticleManager.php';
require_once 'Model/CommentaireManager.php';


class ControleurArticle  extends Controleur {

    private $articleManager;
    private $commentaireManager;

    public function __construct(){
        $this->articleManager = new ArticleManager();
        $this->commentaireManager = new CommentaireManager();
    }

    // Action par défauts
    public function index() {
        $id_art = $this->requete->getParametre("id");
        $article = $this->articleManager->getArticle($id_art);
        $commentaires = $this->commentaireManager->getCommentaire($id_art);
        $this->genererVue(array('article' => $article, 'commentaires' => $commentaires));
    }

    //Ajoute un commentaire à l'article
    public function commenter() {
        $id_art = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");
        $this->commentaireManager->ajouterCommentaire($auteur, $contenu, $id_art);
        //Exécute l'action par défaut pour actualisé la liste des articles
        $this->executerAction("index");
    }

    // Signale un commentaire
    public function reported() {
        $id_com = $this->requete->getParametre("id_com");
        $id_art = $this->requete->getParametre("id_art");
        $this->commentaireManager->report_com($id_com);
        $this->rediriger("article" . '/' . $id_art);
    }




}