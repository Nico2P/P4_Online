<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 15/09/2017
 * Time: 11:57
 */
require_once 'Framework/Controleur.php';

abstract class ControleurSecurise extends Controleur
{
    public function executerAction($action)
    {
        // Si les info utilisateur son présente l'action continue sinon redirection pour authentification
        if ($this->requete->getSession()->existeAttribut('user_id')) {
            parent::executerAction($action);
        }
        else {
            $this->rediriger("connexion");
        }

    }

}