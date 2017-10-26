<?php

require_once 'ControleurSecurise.php';
require_once 'Model/ArticleManager.php';
require_once 'Model/CommentaireManager.php';
require_once 'Model/Utilisateur.php';

class ControleurAdmin extends ControleurSecurise
{
    private $articleManager;
    private $commentaireManager;
    private $utilisateur;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->commentaireManager = new CommentaireManager();
        $this->utilisateur = new Utilisateur();
    }


    // Action par défaut
    public function index()
    {
        $nbArticles = $this->articleManager->getNombreArticles();
        $nbCommentaires = $this->commentaireManager->getNombreCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $listArticles = $this->articleManager->getArticles();
        $resultat = $this->commentaireManager->is_report();
        $this->genererVue(array('nbArticles' => $nbArticles, 'nbCommentaires' => $nbCommentaires, 'login' => $login, 'articles' => $listArticles, 'listreport' => $resultat));
    }

    // CREATE READ UPDATE DELETE

    public function ajouter() {
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");
        $this->articleManager->ajouterArticle($titre, $contenu);
        $this->rediriger("admin");
    }

    public function modifier() {
        $id_art = $this->requete->getParametre("id");
        $article = $this->articleManager->getArticle($id_art);
        $this->genererVue(array('article' => $article));
    }

    public function update()
    {
        $id_art = $this->requete->getParametre("id");
        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");
        $this->articleManager->updateArticle($titre, $contenu, $id_art);
        $this->rediriger("admin");
    }

    public function supprimer() {
        $id = $this->requete->getParametre("id");
        $this->articleManager->supprimerArticle($id);
        $this->commentaireManager->supprimer_commentaire($id);
        $this->rediriger("admin");

    }

    // DELETE AND VALID COMMENTARY

    public function suppCommentaire() {
        $id = $this->requete->getParametre("id");
        $this->commentaireManager->supprimer_commentaire($id);
        $this->rediriger("admin");
    }

    public function notReport() {
            $id_com = $this->requete->getParametre("id");
            $this->commentaireManager->isValid($id_com);
            $this->rediriger("admin");
    }


    // FONCTION SUPP ADD USER -> PASSWORD HASH

    public function addUser() {
        $pseudo = $this->requete->getParametre("pseudo");
        $mdp = $this->requete->getParametre("mdp");
        $mdphash = password_hash($mdp, PASSWORD_DEFAULT);
        $this->utilisateur->addUser($pseudo,$mdphash);
        $this->rediriger("admin");
    }

    // GENERATION VUE

    public function newUser() {
        $this->genererVue();
    }

    public function ajout() {
        $this->genererVue();
    }

}
