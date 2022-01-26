<div class="container">
    <?php
    echo '<h3>Bienvenue sur le site de gestion de maison</h3>';
    if (isset($_SESSION['nom'])) {
        echo '<h5>Vous pouvez maintenant acceder à la gestion de vos propriétés ou de vos locations </h5>';
    } else {
        echo '<h5>Vous devez vous connecter pour acceder aux fonctionnalités avancés du site </h5>';
    }
    ?>
</div>
