<div class="container">
        <div class="form-group col-md-4">
            <h3><?php echo $_SESSION['nom'].' '.$_SESSION['prenom'] ?></h3>
        </div>

        <div class="form-group col-md-4">
            <label for="firstname">Nom</label>
            <input type="text" name="firstname" class="form-control" value="<?php echo $utilisateur["nom"]?>" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="surname">Prenom</label>
            <input type="text" name="surname" class="form-control" value="<?php echo $utilisateur["prenom"]?>" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="surname">Mail</label>
            <input type="email" name="mail" class="form-control" value="<?php echo $utilisateur["mailCompte"]?>" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="birthday">Date de naissance</label>
            <input type="date" name="birthday" class="form-control" id="date" value="<?php echo $utilisateur["dateNaissance"]?>" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="sexe">Genre</label>
            <input type="text" name="sexe" class="form-control" id="sexe" value="<?php echo $utilisateur["genre"]?>" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="phone">Numéro de téléphone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $utilisateur["numTel"]?>" disabled>
        </div>
</div>