<div class="container">
    <form action="/ProjetWeb/index.php?uc=inscription&action=valid_inscription" method="post">
        <div class="form-group col-md-4">
            <h3>Inscription</h3>
        </div>

        <div class="form-group col-md-4">
            <label for="firstname">Nom</label>
            <input type="text" name="firstname" class="form-control" placeholder="Smith" required>
        </div>
        <div class="form-group col-md-4">
            <label for="surname">Prenom</label>
            <input type="text" name="surname" class="form-control" placeholder="John" required>
        </div>
        <div class="form-group col-md-4">
            <label for="surname">Mail</label>
            <input type="email" name="mail" class="form-control" placeholder="exemple@xyz.fr" required>
        </div>
        <div class="form-group col-md-4">
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" class="form-control" id="date" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="form-group col-md-4">
            <label for="sexe">Genre</label>
            <input type="text" name="sexe" class="form-control" id="sexe" placeholder="Homme/Femme/Autre" required>
        </div>
        <div class="form-group col-md-4">
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="XXXXXXXXXX" required>
        </div>
        <div class="form-group col-md-4">
            <label for="password">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" id="password" placeholder="Indiquer votre mot de passe" required>
        </div>
        <button type="submit" class="btn btn-primary">Inscription</button>
    </form>
</div>