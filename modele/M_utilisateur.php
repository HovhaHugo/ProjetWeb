<?php

function getUtilisateur($login,$mdp){
    try {
        $db = mysqli_connect("localhost:8888","root", "", "GestionMaison");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = 'SELECT id, mdp FROM Utilisateur WHERE login ='.$login.', AND mdp = '.$mdp.'LIMIT 0, 5';
    return $req;

}