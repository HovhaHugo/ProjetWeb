<?php

/**
 * Classes d'accés aux données
 * Gére la table utilisateur
 */
class M_Utilisateur{

    /**
     * @param $login
     * @param $mdp
     * @return mixed
     */
    public static function getUtilisateur($login, $mdp)
    {

            //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
            $objPdo = M_connexion::getPdoConnexion();

            //cryptage de la valeur du mots de passe
            $mdp = sha1($mdp);

            //definition de la requete SQL à éxecuter
            $req = "SELECT nom, prenom FROM Utilisateur where idUtilisateur = '$login' and mdp = '$mdp' ";

            //demande d'execution de la requete passer en parametre
            $res = $objPdo->query($req);

            //on recupere le resultat de la requete dans la variable $utilisateur
            $utilisateur = $res->fetchAll();

            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();

            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $utilisateur;

    }

    public static function getUtilisateurs()
    {
        //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
        $objPdo = M_connexion::getPdoConnexion();

        //definition de la requete SQL à éxecuter
        $req = "SELECT nom, prenom FROM Utilisateur ";

        //demande d'execution de la requete passer en parametre
        $res = $objPdo->query($req);

        //on recupere le resultat de la requete dans la variable $utilisateur
        $utilisateur = $res->fetchAll();

        //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
        $res->closeCursor();

        //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
        //ou un tableau vide si aucun enregistrement sont trouvés
        return $utilisateur;

    }
}
?>


