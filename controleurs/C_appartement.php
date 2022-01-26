<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}
//"index.php" recupere le cas d'utilisation  sollicité par l'utilisateur
$action = $_REQUEST["action"];

switch ($action) {

    //Affichage des locations d'un utilisateurs.
    case 'location':
        $location = true;
        //echo $_SESSION["id"];
        $appartement = M_appartement::getAppartmentLouer($_SESSION["id"]);
        //print_r($resultat);
        include 'vues/V_appartement.php';
        break;

    //Affichage des locations d'un utilisateurs.
    case 'propriete':
        $location = false;
        $appartement = M_appartement::getAppartmentAcheter($_SESSION["id"]);
        //$appartement = $resultat[0];
        include 'vues/V_appartement.php';
        break;
}
