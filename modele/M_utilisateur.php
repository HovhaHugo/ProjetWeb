<?php

/**
 * Classes d'accés aux données
 * Gére la table utilisateur
 */
class M_utilisateur{

    /**
     * @brief Fonction permettant de récuperer les utilisateur via leur login et mot de passe
     * @param $login 'Le login de l'utilisateur'
     * @param $mdp 'Le mot de passe de l'utilisateur'
     * @return mixed
     */
    public static function getUtilisateurByLogin($login, $mdp)
    {

            //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
            $objPdo = M_connexion::getPdoConnexion();

            //cryptage de la valeur du mots de passe
            $mdp = sha1($mdp);

            //definition de la requete SQL à éxecuter
            $req = "SELECT idUtilisateur, nom, prenom, administrateur FROM utilisateur where idUtilisateur = '$login' and motDePasse = '$mdp' ";

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

    /**
     * @brief Fonction permettant de récuperer les utilisateur via leur identifiant)
     * @param $id 'L'identifiant cacher de l'utilisateur'
     * @return mixed
     */
    public static function getUtilisateurByID($id)
    {

        //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
        $objPdo = M_connexion::getPdoConnexion();

        //definition de la requete SQL à éxecuter
        $req = "SELECT idUtilisateur, mailCompte, nom, prenom, dateNaissance, genre, numTel, administrateur  FROM utilisateur where idUtilisateur = '$id'";

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

    /**
     * @brief Fonction permettant de recuperer tout les utilisateurs de la base de donnees
     * @return mixed
     */
    public static function getUtilisateurs()
    {
        //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
        $objPdo = M_connexion::getPdoConnexion();

        //definition de la requete SQL à éxecuter
        $req = "SELECT mailCompte, nom, prenom, dateNaissance, genre, numTel FROM utilisateur";

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

    /**
     * @brief Fonction permettant l'inscription d'un utilisateur grace a ses informations
     * @param $mail 'Le mail de l'utilisateur au format exemple@xyz.fr'
     * @param $nom 'Le nom de l'utilisateur en chaine de caractere'
     * @param $prenom 'Le prenom de l'utilisateur en chaine de caractere'
     * @param $birthday 'la date de naissance de l'utilisateur au format YYYY-MM-DD'
     * @param $genre 'Le genre de l'utilisateur en chaine de caractere'
     * @param $phone 'Le telephone de l'utilisateur en chaine de caractere(pour accepeter le 0 devant)'
     * @param $mdp 'Le mot de passe de l'utilisateur en chaine de caractere(qui sera ensuite crypter)'
     * @return false|string
     */
    public static function setUtilisateur($mail, $nom, $prenom, $birthday, $genre, $phone, $mdp)
    {

        //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
        $objPdo = M_connexion::getPdoConnexion();
        $date = new DateTime();
        $idUser =  $date->getTimestamp().$nom[0].$prenom[0];
        $today = date('Y-m-d');
        $etat = "Actif";

        //cryptage de la valeur du mots de passe
        $mdp = sha1($mdp);

        //definition de la requete SQL à éxecuter
        $sql = 'INSERT INTO utilisateur(idUtilisateur, dateCreationCompte, mailCompte, etatCompte, nom, prenom, dateNaissance, genre, numTel, motDePasse)'.
            'VALUES(:idUser, :today, :mail, :etat, :nom, :prenom, :birthday, :genre, :phone, :mdp)';

        //demande d'execution de la requete passer en parametre
        $statement = $objPdo->prepare($sql);

        $statement->execute([
            ':idUser' => $idUser,
            ':today' => $today,
            ':etat' => $etat,
            ':mail' => $mail,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':birthday' => $birthday,
            ':genre' => $genre,
            ':phone' => $phone,
            ':mdp' => $mdp
        ]);

        $data = self::getUtilisateurByID($idUser);

        //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
        //ou un tableau vide si aucun enregistrement sont trouvés
        return $data;

    }
}
?>


