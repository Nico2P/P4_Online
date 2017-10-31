<?php

require_once 'Framework/Model.php';
require_once 'Model/ArticleManager.php';

class ArticleManager extends Model
{
    // Retourne les articles
    public function getArticles() {
        $sql = 'SELECT * FROM articles ORDER BY id_art ASC';
        $articles = $this->executerRequete($sql);
        return $articles;
    }

    // Retourne un article en fonction de l'id
    public function getArticle($id_art) {
        $sql = 'SELECT id_art AS id, date_art AS date, titre_art AS titre, contenu_art AS contenu FROM articles WHERE id_art=?';
        $article = $this->executerRequete($sql, array($id_art));
        if ($article->rowCount() == 1)
            return $article->fetch();
        else
            throw new Exception("Aucun article ne correspond à l'indentifiant '$id_art'");
    }

    // Retourne le nombres d'articles
    public function getNombreArticles() {
        $sql = 'SELECT COUNT(*) AS nbArticles FROM articles';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['nbArticles'];
    }

    // Ajout un articles dans la bdd
    public function addArticle($titre,$contenu) {
        $sql = 'INSERT INTO articles(titre_art, contenu_art, date_art) VALUES(?,?,?)';
        $date = date(DATE_RSS); // date courante
        $this->executerRequete($sql, array($titre,$contenu,$date));

    }

    public function deleteArticle($id_art) {
        $sql = 'DELETE FROM articles WHERE id_art = '. $id_art;
        $this->executerRequete($sql, array($id_art));
        $sql_com = 'DELETE FROM commentaires WHERE id_article = '. $id_art;
        $this->executerRequete($sql_com, array($id_art));
    }

    public function updateArticle($titre_art, $contenu_art, $id_art) {
        $sql ='UPDATE articles SET titre_art = :titre_art, contenu_art = :contenu_art , date_art = :date_art WHERE id_art = :id_art';
        $date = date(DATE_RSS); // date courante
        $this->executerRequete($sql,array(
            'titre_art' => $titre_art,
            'contenu_art' => $contenu_art,
            'id_art' => $id_art,
            'date_art' => $date
        ));
    }

}