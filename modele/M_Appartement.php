<?php

/**
 * Classes d'accés aux données
 * Gére la table Appartement
 */
class M_Appartement{

    /**
     * @param $idUtilisateur l'utilisateur concerne
     * @param $estAdmin vrai si l'utilisateur est administrateur (on affiche tous les appartements)
     * Cela evite de refaire une requete puisque la page contient deja cette information
     * @param $current booleen indiquant si l'on veut tout les appartements en cours,
     * ou si l'on veut aussi compter ceux passes (pour faire un historique)
     * @param $location booleen indiquant si l'on veut afficher les appartements loues,
     * sinon possedes
     * @return mixed
     */
    public static function getAllAppartment($idUtilisateur,$estAdmin, $location)
    {

            //on recupere une instance de la classe M_connexion qui etablit une connexion à la base de données
            $objPdo = M_connexion::getPdoConnexion();

            //creation de la requete personnalisee
            $table = '';
            if($location==true)
                $table='DateLocation';
            else
                $table='DateProprietaire';

            //Différence entre user et admin.
            $target = '';
            if($estAdmin==false)
                $target = 'idUtilisateur='.$idUtilisateur;


            //assemblage de la requete SQL à éxecuter
            $req = 'SELECT Appartement.nom AS NomAppartement, Maison.num AS NumeroRue, Rue.nom AS NomRue, Ville.nom AS NomVille
            FROM '.$table.'
            INNER JOIN Appartement USING(idAppartement)
            INNER JOIN Maison USING(idMaison)
            INNER JOIN Rue USING(idRue)
            INNER JOIN Ville USING(idVille)';

            if($target!='')
                $req = $req.' Where '.$target;


            //demande d'execution de la requete passee en parametre
            $res = $objPdo->query($req);

            //on recupere le resultat de la requete dans la variable $utilisateur
            $resultat = $res->fetchAll();

            //ferme le curseur ce qui permet à la requete d'etre de nouveau executée
            $res->closeCursor();

            //retourne un tableau contenant toutes les lignes du jeu d'enregistrements
            //ou un tableau vide si aucun enregistrement sont trouvés
            return $resultat;

    }
}
?>


