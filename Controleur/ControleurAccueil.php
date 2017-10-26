<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 31/08/2017
 * Time: 16:35
 */

require_once 'Framework/Controleur.php';
require_once 'Model/ArticleManager.php';


class ControleurAccueil  extends Controleur {

    private $articles;

    public function __construct(){
        $this->articles = new ArticleManager();
    }

    // Affiche la listes des billets
    public function index() {
        $articles = $this->articles->getArticles();
        $this->genererVue(array('articles' => $articles));
    }
}