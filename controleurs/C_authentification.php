<?php
require("modele/M_Utilisateur.php");

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

//"index.php" recupere le cas d'utilisation (fonctionnalite_publique) sollicité par l'utilisateur
$action = $_REQUEST["action"];

switch ($action) {

    case 'se_connecter':
        include 'vues/V_connexion.php';
        break;

    case 'valid_connexion':
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];

        echo $result = getUtilisateur($login, $mdp);
        //appel à la passerelle
        /*$result = getUtilisateur($login, $mdp);

        if ($result) {
            $_SESSION['login'] = $result[0]["login"];
            header('Location: index.php');
        } else {
            session_destroy();
            header('Location: index.php');
            include 'vues/V_connexion.php';
        }*/

        break;
    case "se_deconnecter":
        session_destroy();
        header('Location: index.php');
        break;
}
?>


