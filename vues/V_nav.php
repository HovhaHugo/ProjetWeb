<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <!--En tete de la page-->
    <a class="navbar-brand" href="index.php?uc=acceuil" >Gestion des maison</a>

    <!--Gestion du menu sur mobile-->
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#menu">
        <span class="navbar-toggler-icon fas fa-bars"></span>
    </button>


    <!--Liste des element dans le menu-->
    <div class="collapse navbar-collapse" id="menu">

        <?php
        if (isset($_SESSION["nom"])) {
            ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Propriétés</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?uc=appartement&action=propriete">Liste des appartements</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Locations</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php?uc=appartement&action=location">Liste des appartements</a>
                    </div>
                </li>
            </ul>
            <?php
                //Gestion du cas d'un administrateur
            if (isset($_SESSION["admin"])) {
                ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Administrateurs</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="index.php?uc=administrateur&action=utilisateur">Liste des utilisateurs</a>
                            <a class="dropdown-item" href="index.php?uc=administrateur&action=statistique">Statistique</a>
                        </div>
                    </li>
                </ul>
            <?php }
            ?>

            <ul class="navbar-nav ml-auto">
                <!--Balise href pour le login de l'utilisation pour la presentation !-->
                <li class='nav-item'><a class="nav-link" href="index.php?uc=utilisateur&action=affichage"><span class="fas fa-user"></span>
                        <?php echo $_SESSION['prenom'] ." ". $_SESSION['nom'] ; ?></a></li>
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