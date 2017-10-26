<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 07/09/2017
 * Time: 14:16
 */


require_once 'Session.php';

class Requete
{
    //paramètre de la requête
    private $parametres;
    private $session;

    public function __construct($parametres)
    {
        $this->parametres = $parametres;
        // Gestion de la session
        $this->session = new Session();
    }

    // Renvoi vrai si le paramètre existe
    public  function existeParametre($nom) {
        return (isset($this->parametres[$nom]) && $this->parametres[$nom] != "");
    }

    // Renvoi le parametre
    public function getParametre($nom) {
        if ($this->existeParametre($nom)) {
            return $this->parametres[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent de la requête");
    }

    // Renvoi l'objet session associé a la requête
    public function getSession() {
        return $this->session;
    }
}