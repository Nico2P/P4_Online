<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 31/08/2017
 * Time: 17:38
 */

require_once 'Controleur.php';
require_once 'Requete.php';
require_once 'Vue.php';

class Routeur {

    public function routerRequete() {
        try {
            // Fusion des parametres GET et POST de la requête
            $requete = new Requete(array_merge($_GET, $_POST));
            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);
            $controleur->executerAction($action);
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le controleur en fonction de la requete
    private function creerControleur(Requete $requete) {
        $controleur = 'Accueil';
        if ($requete->existeParametre('controleur')) {
            $controleur = $requete->getParametre('controleur');
            $controleur = ucfirst(strtolower($controleur));
        }
        // Création du nom du fichier du contrôleur
        $classControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur/" . $classControleur . ".php";
        if (file_exists($fichierControleur)) {
            // Instance du contrôleur en fonction de la requete
            require ($fichierControleur);
            $controleur = new $classControleur();
            $controleur->setRequete($requete);
            return $controleur;
        }
        else
            throw new Exception("Fichier '$fichierControleur' introuvable");
    }

    // Détermine l'action a executer en fonction de la requete
    private function creerAction(Requete $requete) {
        $action = "index"; // action par defaut
        if ($requete->existeParametre('action')) {
            $action = $requete->getParametre('action');
        }
        return $action;
    }

    //Gère les erreurs
    private function gererErreur(Exception $exception) {
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }
}