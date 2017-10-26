<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 13/09/2017
 * Time: 16:53
 */

class Session
{


    // Constructeur
    public function __construct()
    {
        session_start();
    }

    // Déconstructeur
    public function detruire() {
        session_destroy();
    }

    // Ajout attribut à la session
    public function setAttribut($nom, $valeur) {
        $_SESSION[$nom] = $valeur;
    }

    // Renvoi vrai si l'attribut existe et n'est pas vide
    public function existeAttribut($nom) {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
    }

    // Renvoi la valeur de l'attribut en parametre
    public function getAttribut($nom) {
        if ($this->existeAttribut($nom)) {
            return $_SESSION[$nom];
        }
        else {
            throw new Exception("Attribut '$nom' absent de la session");
        }
    }
}