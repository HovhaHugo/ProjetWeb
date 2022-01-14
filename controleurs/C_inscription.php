<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

//"index.php" recupere le cas d'utilisation (fonctionnalite_publique) sollicité par l'utilisateur
$action = $_REQUEST["action"];

switch ($action) {

    case 'inscription':
        include 'vues/V_inscription.php';
        break;

    case 'valid_inscription':
        $nom = $_POST["firstname"];
        $prenom = $_POST["surname"];
        $birthday = $_POST["birthday"];
        $sexe = $_POST["sexe"];
        $phone = $_POST["phone"];
        $mdp = $_POST["mdp"];
        $date = new DateTime();
        //echo $date->getTimestamp();


        //appel à la passerelle
        $result = M_Utilisateur::setUtilisateur($nom, $prenom, $birthday, $sexe, $phone, $mdp);

        if ($result) {
            echo("Initial : ".$nom[0].$prenom[0]."       Id = ".$date->getTimestamp().$result);
            /*$_SESSION['nom'] = $result[0]["nom"];
            $_SESSION['prenom']= $result[0]["prenom"];
            if($result[0]["administrateur"] == 1){
                $_SESSION['admin']= true;
            }*/
            //header('Location: index.php');
        } else {
            session_destroy();
            header('Location: index.php');
            include 'vues/V_connexion.php';
        }
        break;
}
?>
