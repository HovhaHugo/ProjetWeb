<div class="container">
    <?php
    if (isset($_SESSION['login'])) {
        echo '<h3>Bienvenue sur le site. Vous etes connecter ' . $_SESSION['login'] . ' !</h3>';
    } else {
        echo '<h3>Bienvenue sur le site</h3>';
        echo '<h5>Vous devez vous connecter pour acceder aux fonctionnalités privées </h5>';
    }
    ?>
</div>
