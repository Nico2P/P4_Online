<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 18/09/2017
 * Time: 10:26
 */

require_once 'Framework/Model.php';

class Utilisateur extends Model
{
    //Vérifie que l'utilisateur existe dans la BD
    public function exist($login){
        $sql = 'SELECT user_id AS user_id, user_login AS login, user_mdp AS mdp FROM USER WHERE user_login=?';
        $user = $this->executerRequete($sql, array($login));
        return ($user->rowCount() == 1);
    }


    public function getUser($login){
        $sql = 'SELECT user_id AS user_id, user_login AS login, user_mdp AS user_mdp FROM USER WHERE user_login=?';
        $user = $this->executerRequete($sql, array($login));
        if ($user->rowCount() == 1)
            return $user->fetch();
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
    }

    public function addUser($pseudo, $mdp) {
        $sql = 'INSERT INTO user(user_login, user_mdp) VALUES (?,?)';
        $this->executerRequete($sql, array($pseudo, $mdp));
    }
}