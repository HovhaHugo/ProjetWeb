<?php

/**
 * Classes d'accés a des stats diverses
 */
class M_statistiques{


    public static function getRepartitionParAge()
    {
            $objPdo = M_connexion::getPdoConnexion();

            //CREATE VIEW AgeUtilisateur AS SELECT idUtilisateur, TIMESTAMPDIFF(YEAR, dateNaissance, CURDATE()) AS 'age' FROM utilisateur;

            $req = "SELECT SUM(CASE WHEN age < 18 THEN 1 ELSE 0 END) AS 'Under 18',
            SUM(CASE WHEN age BETWEEN 18 AND 24 THEN 1 ELSE 0 END) AS '18-24',
            SUM(CASE WHEN age BETWEEN 25 AND 45 THEN 1 ELSE 0 END) AS '24-45',
            SUM(CASE WHEN age BETWEEN 46 AND 65 THEN 1 ELSE 0 END) AS '45-65',
            SUM(CASE WHEN age> 65 THEN 1 ELSE 0 END) AS '+65'
            FROM ageutilisateur";

            $res = $objPdo->query($req);
            $resultat = $res->fetchAll();
            $res->closeCursor();

            return $resultat;

    }

    public static function getEvolutionNombreUtilisateur()
    {
        $objPdo = M_connexion::getPdoConnexion();

        $req = "SELECT COUNT(idUtilisateur) AS 'NbInscription', MONTH(dateCreationCompte) AS 'Mois',YEAR(dateCreationCompte) AS 'Annee' FROM utilisateur
        GROUP BY YEAR(dateCreationCompte),MONTH(dateCreationCompte)
        ORDER BY YEAR(dateCreationCompte),MONTH(dateCreationCompte)";

        $res = $objPdo->query($req);
        $resultat = $res->fetchAll();
        $res->closeCursor();

        return $resultat;

    }

    public static function getAppartementParDepartement()
    {
        $objPdo = M_connexion::getPdoConnexion();

        $req = "SELECT nomDep AS 'Departement', COUNT(idAppartement) AS 'nbAppartement' FROM appartement 
        INNER JOIN maison USING(idMaison)
        INNER JOIN rue USING(idRue)
        INNER JOIN ville USING(idVille)
        INNER JOIN departement USING(numDep)
        GROUP BY nomDep
        ORDER BY COUNT(idAppartement)";

        $res = $objPdo->query($req);
        $resultat = $res->fetchAll();
        $res->closeCursor();

        return $resultat;

    }

    public static function getNombreTotalAppartement()
    {
        $objPdo = M_connexion::getPdoConnexion();

        $req = "SELECT COUNT(*) AS 'NbTotalAppartement' FROM appartement";

        $res = $objPdo->query($req);
        $resultat = $res->fetchAll();
        $res->closeCursor();

        return $resultat;

    }

    public static function getNombreTotalAppareil()
    {
        $objPdo = M_connexion::getPdoConnexion();

        $req = "SELECT COUNT(*) AS 'NbTotalAppareil' FROM appareil";

        $res = $objPdo->query($req);
        $resultat = $res->fetchAll();
        $res->closeCursor();

        return $resultat;

    }

    public static function getNombreMoyenAppareilParAppartement()
    {
        $objPdo = M_connexion::getPdoConnexion();

        $req = "SELECT AVG(nombre.nbAppareil)
        FROM (SELECT COUNT(idAppareil) AS 'nbAppareil'
	        FROM appartement A
	        INNER JOIN piece USING(idAppartement)
	        INNER JOIN appareil USING(idPiece)
	        GROUP BY A.idAppartement
	        ) as nombre";

        $res = $objPdo->query($req);
        $resultat = $res->fetchAll();
        $res->closeCursor();

        return $resultat;

    }


}
?>


