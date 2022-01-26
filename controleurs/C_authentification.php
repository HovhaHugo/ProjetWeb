<?php
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

        //appel à la passerelle
        $result = M_Utilisateur::getUtilisateur($login, $mdp);

        if ($result) {
            //echo($result[0]["nom"]);
            $_SESSION['nom'] = $result[0]["nom"];
            $_SESSION['prenom']= $result[0]["prenom"];
            if($result[0]["administrateur"] == 1){
                $_SESSION['admin']= true;
            }
            header('Location: index.php');
        } else {
            session_destroy();
            header('Location: index.php');
            include 'vues/V_connexion.php';
        }
        break;
    case "se_deconnecter":
        session_destroy();
        header('Location: index.php');
        break;
}
?>


