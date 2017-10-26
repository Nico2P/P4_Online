<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 18/08/2017
 * Time: 14:58
 */

require_once 'Configuration.php';


abstract class Model {

    //PDO accès BD
    private static $bdd;

    /**
     * Exécute une requete SQL
     * @param string $sql
     * @param array $params
     * @return PDOStatement
     */

    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = self::getBdd()->query($sql); // Direct
        }
        else {
            $resultat = self::getBdd()->prepare($sql); // Préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoi un obj de connexion a la BDD en initialisant la connexion
     * @return PDO
     */
    private function getBdd() {
        if (self::$bdd === null) {
            // recupération des parametres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            self::$bdd = new PDO($dsn, $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        }
        return self::$bdd;
    }

}
