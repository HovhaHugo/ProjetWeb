<?php


$sql ='SELECT dateDebut FROM DateLocation WHERE 
            idAppartement='.$_POST['idAppartement'].' AND idUtilisateur='.$_POST['idU'].' AND dateFin=NULL';
//Il faut que la dateFin soit nulle pour etre sur que l'on recupere la location en cours
//Et pas une precedente location du meme appartement par le meme utilisateur

$requete_locationDate = $bdd->query($sql);


$sql ='SELECT libelleTypePiece, libellePiece,libelleAppareil,categorie FROM TypePiece
        INNER JOIN Piece USING(idTypePiece)
        INNER JOIN Appareil USING(idPiece)
        INNER JOIN TypeAppareil USING(idTypeAppareil)
        WHERE Piece.idAppartement='.$_POST['idAppartement']. '
        ORDER BY libelleTypePiece';

$requete_listeAppareils = $bdd->query($sql);
$tableau = $requete_listeAppareils->fetchAll();

$sql = //Faire une requete pour calculer la consommation totale, puis mois par mois ?
//J'ai pas reussi a faire ces requetes

?>

<html>
<head>

</head>
<body>

//Faire un tableau avec des td tr ? Ou peut etre organiser ca par piece, mais dans ce cas
//Il faut aussi prendre l'ID de chaque piece, on ne peut pas se fier a TypePiece car
//on peut passer par 2 chambres consecutives mais mettre tout les appareils dans une meme case
<?php
    foreach($tableau as $donnees) {
    echo "<div class='Appareil'>";
    echo $donnees['libellePiece'] . '(' .$donnees['libelleTypePiece'].') '.
        $donnees['libelleAppareil'] . ' (' . $donnees['categorie'].')';
    echo "</div>";
}
?>


</body>

</html>
