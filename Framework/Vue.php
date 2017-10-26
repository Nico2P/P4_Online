<?php
require_once 'Configuration.php';

class Vue {

    //Fichier associé a la vue
    private $fichier;
    // Titre de la vue
    private $titre;

    public function __construct($action, $controleur = "") {
       // Détermine le nom du fichier vue à partir de l'action
        $fichier = "Vue/";
        if ($controleur != "") {
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier . $action . ".php";
    }

    // génere et affiche la vue
    public function generer($donnees) {
        //Partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // On definit une variable local accessible par la vue pour la racine web
        $racineWeb = Configuration::get("racineWeb", "/P4/");
        //Génération gabarit
        $vue = $this->genererFichier("Vue/template.php", array("titre" => $this->titre, "contenu" => $contenu, "racineWeb" => $racineWeb));
        // Renvoi au navigateur
        echo $vue;
    }

    //Génère le fichier de vue
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // tempo de sortie
            ob_start();
            //Inclut le fichier vue et son resultat dans le tampo de sortie
            require $fichier;
            // renvoi et stop tempo
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

    //Secu
    private function nettoyer($valeur) {
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }
}