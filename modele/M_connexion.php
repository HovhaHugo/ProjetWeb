<?php

/**
 * Classe d'accès aux donnèes.
 * Utilise les services de la classe PDO
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $objPdo de type PDO
 * $objPdoConnexion qui contiendra l'unique instance de la classe
 * @author
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */
class M_connexion {

    private static $strServeur = 'mysql:host=localhost';
    private static $strBdd = 'dbname=ProjetWeb';
    private static $strUser = 'root';
    private static $strMdp = 'root';
    private static $objPdo;
    private static $objPdoConnexion = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct() {
        try {
            M_connexion::$objPdo = new PDO(M_connexion::$strServeur .';' . M_connexion::$strBdd,
                M_connexion::$strUser, M_connexion::$strMdp);
            M_connexion::$objPdo->query("SET CHARACTER SET utf8");
            M_connexion::$objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'Echec lors de la connexion ! ' . $e->getMessage();
            die();
        }
    }

    /**
     * destructeur de la classe
     *
     */
    public function __destruct() {
        M_connexion::$objPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * @return l'objet objPdo de la classe PdoConnexion
     */
    public static function getPdoConnexion() {
        if (M_connexion::$objPdoConnexion == null) {
            M_connexion::$objPdoConnexion = new M_connexion();
        }
        return M_connexion::$objPdo;
    }

}
