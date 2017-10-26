<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 31/08/2017
 * Time: 15:40
 */

require_once 'Framework/Model.php';

class CommentaireManager extends Model {

    //Retourne les commentaires relatif à l'article choisi
    public function getCommentaire($id_art) {

        $sql = 'SELECT id_com AS id, date_com AS DATE, auteur_com AS auteur, contenu_com AS contenu ,reported AS reported FROM commentaires WHERE id_article=? AND reported = 0';
        $commentaires = $this->executerRequete($sql, array($id_art));
        return $commentaires;
    }

    // Ajout un commentaire dans la bdd
    public function ajouterCommentaire($auteur, $contenu, $id_art) {
        $sql = 'INSERT INTO commentaires(date_com, auteur_com, contenu_com, id_article) VALUES(?, ?, ?, ?)';
        $date = date(DATE_W3C); // date courante
        $this->executerRequete($sql, array($date,$auteur,$contenu,$id_art));
    }

    // Retourne le nombres de commentaires
    public function getNombreCommentaires() {
        $sql = 'SELECT COUNT(*) AS nbCommentaires FROM commentaires';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['nbCommentaires'];
    }

    public function report_com($id_com) {
        $sql = 'UPDATE commentaires SET reported = TRUE WHERE id_com ='.$id_com;
        $this->executerRequete($sql);
    }

    public function is_report() {
        $sql = 'SELECT auteur_com AS auteur, contenu_com AS contenu, id_com AS id FROM commentaires WHERE reported=1';
        $commentaire_reporte = $this->executerRequete($sql);
        return $commentaire_reporte;
    }

    public function supprimer_commentaire($id) {
        $sql = 'DELETE FROM commentaires WHERE id_com = '. $id;
        $this->executerRequete($sql, array($id));
    }

    public function isValid($id) {
        $sql = 'UPDATE commentaires SET reported = FALSE WHERE id_com ='.$id;
        $this->executerRequete($sql);
    }
}