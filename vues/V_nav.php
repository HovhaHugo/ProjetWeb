<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <!--En tete de la page-->
    <a class="navbar-brand" href="index.php?uc=acceuil" >Mon Site</a>

    <!--Gestion du menu sur mobile-->
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#menu">
        <span class="navbar-toggler-icon fas fa-bars"></span>
    </button>


    <!--Liste des element dans le menu-->
    <div class="collapse navbar-collapse" id="menu">

        <!--Fait le lien au fichier "index" avec le cas d'utilisation (uc) "fonctionnalite_publique"-->
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php?uc=fonctionnalite_publique">Fonctionalité publique</a></li>
        </ul>
        <?php
        if (isset($_SESSION["login"])) {
            ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Fonctionnalité privé</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?uc=liste_utilisateurs">Liste des utilisateurs</a>
                        <a class="dropdown-item" href="index.php?uc=fonctionnalite2">Fonctionnalité 2</a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!--Balise href pour le login de l'utilisation pour la presentation !-->
                <li class='nav-item'><a class="nav-link" href="#"><span class="fas fa-user"></span>
                        <?php echo " " . $_SESSION['login']; ?></a></li>
                <li class='nav-item'><a class="nav-link" href="index.php?uc=authentification&action=se_deconnecter">
                        Se deconnecter<span class="fas fa-sign-in-alt"></span></a></li>
            </ul>
        <?php } else {
            ?>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?uc=authentification&action=se_connecter">
                        Se connecter<span class="fas fa-sign-in-alt"></span></a></li>
            </ul>
        <?php }
        ?>
    </div>
</nav>