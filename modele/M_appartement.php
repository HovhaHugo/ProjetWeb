<?php

/**
 * Classes d'accés aux données
 * Gére la table Appartement
 */
class M_appartement{

    /**
     * @param $idUtilisateur l'utilisateur concerne
     * @param $location bool indiquant si l'on veut afficher les appartements loues,
     * sinon possedes
     * @return mixed
     */
    public static function getAppartmentLouer($idUtilisateur){
            //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
            $objPdo = M_connexion::getPdoConnexion();

            //assemblage de la requete SQL à éxecuter
            $req = "SELECT appartement.libelleAppartement, maison.numMaison, rue.nomRue, ville.nomVille FROM datelocataire ".
                "INNER JOIN appartement USING(idAppartement) INNER JOIN maison USING(idMaison) ".
                "INNER JOIN rue USING(idRue) INNER JOIN ville USING(idVille) WHERE idUtilisateur = '$idUtilisateur'";


            //demande d'execution de la requete passee en parametre
            $res = $objPdo->query($req);

            //on recupere le resultat de la requete dans la variable $appartement
            $appartement = $res->fetchAll();

            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();

            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $appartement;

    }

    public static function getAppartmentAcheter($idUtilisateur){
        //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
        $objPdo = M_connexion::getPdoConnexion();

        //assemblage de la requete SQL à éxecuter
        $req = "SELECT appartement.libelleAppartement, maison.numMaison, rue.nomRue, ville.nomVille FROM dateproprietaire ".
            "INNER JOIN appartement USING(idAppartement) INNER JOIN maison USING(idMaison) ".
            "INNER JOIN rue USING(idRue) INNER JOIN ville USING(idVille) WHERE idUtilisateur = '$idUtilisateur'";


        //demande d'execution de la requete passee en parametre
        $res = $objPdo->query($req);

        //on recupere le resultat de la requete dans la variable $appartement
        $appartement = $res->fetchAll();

        //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
        $res->closeCursor();

        //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
        //ou un tableau vide si aucun enregistrement sont trouvés
        return $appartement;

    }

    public static function getDateDebutLocation($idApartement, $idUtilisateur){
        //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
        $objPdo = M_connexion::getPdoConnexion();


        $req ='SELECT dateDebut FROM datelocation WHERE idAppartement='.$idApartement.
            ' AND idUtilisateur='.$idUtilisateur.' AND dateFin=NULL';

        //demande d'execution de la requete passee en parametre
        $res = $objPdo->query($req);

        //on recupere le resultat de la requete dans la variable $resultat
        $resultat = $res->fetchAll();

        //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
        $res->closeCursor();

        return $resultat;
    }

    public static function getPiece($idApartement){
        //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
        $objPdo = M_connexion::getPdoConnexion();


        $req ='SELECT libelleTypePiece, libellePiece,libelleAppareil,categorie FROM typepiece'.
            'INNER JOIN piece USING(idTypePiece), INNER JOIN appareil USING(idPiece)'.
            'INNER JOIN typeAppareil USING(idTypeAppareil) WHERE piece.idAppartement='.$_POST['idAppartement'].
            'ORDER BY libelleTypePiece';

        //demande d'execution de la requete passee en parametre
        $res = $objPdo->query($req);

        //on recupere le resultat de la requete dans la variable $resultat
        $resultat = $res->fetchAll();

        //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
        $res->closeCursor();

        return $resultat;
    }
}
?>


