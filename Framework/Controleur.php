<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 07/09/2017
 * Time: 15:46
 */

require_once 'Requete.php';
require_once 'Vue.php';

abstract class Controleur
{
    // Action à réaliser
    private $action;

    //Requête entrante
    protected $requete;

    //Définit la requête entrante
    public function setRequete(Requete $requete) {
        $this->requete = $requete;
    }

    // Exécute l'action
    public function executerAction($action) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe '$classeControleur'");
        }
    }


    //Methode abstraite correspondant à l'action par defaut
    // Oblige les class dérivées à implémenter cette action par défaut
    public abstract function index();

    // Génère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array(), $action = null) {

        // Utilisation du nom du controleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controleur", "", $classeControleur);
        // Instancie et genere la vue
        $vue = new Vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }

    // redirige vers le controleur et l'action spécifié
    protected function rediriger($controleur, $action = null) {
        $racineWeb = Configuration::get("racineWeb", "/");
        // redirection vers l'url racine_site/controleur/action
        header("Location:" . $racineWeb . $controleur . "/" . $action);
    }

}