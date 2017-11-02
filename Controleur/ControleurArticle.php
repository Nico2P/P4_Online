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
    public function comment() {

        $id_art = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");
        if (preg_match("#^\S+\w{1,120}\S{1,}#", $auteur )) {
            $this->commentaireManager->addCommentaire(htmlspecialchars($auteur), htmlspecialchars($contenu), $id_art);
            $this->executerAction("index");
        } else {
            //Exécute l'action par défaut pour actualisé la liste des articles
            throw new Exception("Action impossible : auteur ou contenu non defini");
        }


    }

    // Signale un commentaire
    public function reported() {
        $id_com = $this->requete->getParametre("id_com");
        $id_art = $this->requete->getParametre("id_art");
        $this->commentaireManager->report_com($id_com);
        $this->rediriger("article" . '/' . $id_art);
    }




}