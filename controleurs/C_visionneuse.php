<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}


//appel à la passerelle
$result = M_Appartement::getAllAppartment($_SESSION["admin"]);

    //Il faudrait aussi récupérer l'ID de l'appartement et l'associer de manière cachée à chaque
//résultat, pour pouvoir utiliser cet ID pour la requete de l'affichage d'un appartement
//En gros que chaque div resultat puisse emmener sur une page avec les infos precises de l'appartement
//Donc il faut qu'a chaque div, il y ai l'ID quelque part en mémoire. Aucune idée de comment faire ça
//On peut pas juste faire un lien en dur parce que ca voudrait dire que tout le monde peut y acceder
//On mettant de id au hasard en URL
        echo '<h2>Appartement(s) que vous louez actuellement</h2>';

        foreach($result as $donnees) {
            echo "<div class='resultat'>";
            echo "<h3>" . $donnees['NomAppartement'] . " </h3>";
            echo "Adresse : " . $donnees['NumeroRue'] . ' ' . $donnees['NomRue'] . ',' . $donnees['NomVille'];
            echo "</div>";
        }
    ?>
