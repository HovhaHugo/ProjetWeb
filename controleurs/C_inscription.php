<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}

//"index.php" recupere le cas d'utilisation sollicité par l'utilisateur
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
        $mail = $_POST["mail"];
        $phone = $_POST["phone"];
        $mdp = $_POST["mdp"];
        $date = new DateTime();


        //appel à la passerelle
        $result = M_utilisateur::setUtilisateur($mail, $nom, $prenom, $birthday, $sexe, $phone, $mdp);

        if ($result) {
            $_SESSION['id']=$result[0]["idUtilisateur"];
            $_SESSION['nom'] = $result[0]["nom"];
            $_SESSION['prenom']= $result[0]["prenom"];
            if($result[0]["administrateur"] == 1){
                $_SESSION['admin']= true;
            }
            header('Location: index.php');
        } else {
            echo("il y a une couille");
            /*session_destroy();
            header('Location: index.php');
            include 'vues/V_connexion.php';*/
        }
        break;
}
?>
