<?php
session_start();

//include acces base de données pour faire les requetes

$sql ='SELECT nom FROM Ville';

$requete_ville = $bdd->query($sql);

$sql ='SELECT libelleDegreSecurite FROM DegreSecurite';

$requete_degreSecurite = $bdd->query($sql);


?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <title>Ajouter appartement</title>
</head>

<body>
<?php include('header.php'); ?>

<div id="page">
    <div id="formAjout">

        <div id="pageForm">
            <h1>Nouvel appartement</h1>
            <form id="formulaire" action="formAjoutAppartement.php" method="post">
                <label for="Surnom">Surnom</label><input type="text" name="nom" placeholder="Surnom de votre appartement" pattern="[A-Za-zÀ-ÿ \-\']{2,100}" required />
                    <h2>Information générale</h2>
                    <p>
                        //Faire une liste déroulante pré-remplie avec toute les villes
                        //Puis en JS, faire un onclick, pour mettre à jour la liste de
                        //toute les rues disponibles associées à cette ville
                        //Doit on donc faire un bouton pour ajouter une nouvelle ville, et une nouvelle rue ?
                        <label>Ville :
                            <select name="listeVille">
                                <?php
                                // Loop it here.
                                while ($liste_ville = $requete_ville->fetch()) {
                                    $nom = $requete_ville['nom'];
                                    echo "<option value=\"".$nom."\" >$nom </option>";
                                }
                                ?>
                            </select>
                        </label>

                        <input type="text" placeholder="Rue">

                        <input type="text" placeholder="Numero">
                    </p>

                </div>
                <div id="bouton"><input type="submit" value="Valider"></div>

            </form>
        </div>
    </div>
</div>
<?php $redirect = basename(__FILE__) ;
include('pied-de-page.php');  ?>

</body>

</html>