<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

//"index.php" recupere le cas d'utilisation sollicité par l'utilisateur
$action = $_REQUEST["action"];

switch ($action) {

    //Affichage des utilisateurs
    case 'utilisateur':
        $utilisateur = M_Utilisateur::getUtilisateurs();
        //print_r($utilisateur);
        include 'vues/V_administrateur.php';
        break;

    //Affichage des statistiques
    case 'statistique':
        include 'vues/V_statistique.php';
        break;
}
?>

