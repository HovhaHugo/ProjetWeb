<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

//"index.php" recupere le cas d'utilisation sollicité par l'utilisateur
$action = $_REQUEST["action"];

switch ($action) {

    //Affichage des données de l'utilisateur.
    case 'affichage':
        $resultat = M_Utilisateur::getUtilisateurByName($_SESSION["nom"],$_SESSION["prenom"]);
        $utilisateur= $resultat[0];
        include 'vues/V_utilisateur.php';
        break;
}
?>

