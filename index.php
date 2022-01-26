<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Gestion des maisons</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>

        <?php
        //demarre une session PHP
        session_start();

        //Permet de charger les fichiers necessaires pour l'accés a la table "utilisateur" de la base de données
        require_once 'modele/M_connexion.php';
        require_once 'modele/M_Utilisateur.php';

        include 'vues/V_nav.php';
        if (!isset($_REQUEST['uc'])) {
            $_REQUEST['uc'] = 'accueil';
        }
        //"index.php" recupere le cas d'utilisation sollicité par l'utilisateur
        $uc = $_REQUEST["uc"];

        switch ($uc) {
            //Oriente vers le controleur "C_authentification.php"
            case "authentification":
                include 'controleurs/C_authentification.php';
                break;
            case "inscription":
                include 'controleurs/C_inscription.php';
                break;
            case "administrateur":
                include 'controleurs/C_administrateur.php';
                break;
            case "utilisateur":
                include 'controleurs/C_utilisateur.php';
                break;
            default :
                include 'vues/V_home.php';
                break;
        }
        ?>

        <!--Liaison avec le kit Fontawesome-->
        <script src="https://kit.fontawesome.com/3295633519.js" crossorigin="anonymous"></script>

        <!--La liaison au Script -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>
