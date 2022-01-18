<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

//"index.php" recupere le cas d'utilisation (fonctionnalite_publique) sollicité par l'utilisateur
$action = $_REQUEST["action"];

switch ($action) {

    case 'affichage':
        include 'vues/V_administrateur.php';
        break;
    case 'modification':
        break;
    case 'suppression':
        break;
}
?>

