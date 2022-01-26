<div class="panel">
    <h3  style="margin-left: 200px">Liste des utilisateurs</h3>
    <table  align="center" style="border-style: solid">
        <tbody>
        <tr style="border-style: solid" align="center">
            <td style="border-style: solid">Nom</td>
            <td style="border-style: solid">Prenom</td>
            <td style="border-style: solid">Mail</td>
            <td style="border-style: solid">Date de naissance</td>
            <td style="border-style: solid">Genre</td>
            <td style="border-style: solid">Numéro de téléphone</td>
        </tr>
        <?php
        foreach ($utilisateur as $unUtilisateur) {
            ?>
            <tr >
                <td style="border-style: solid"><?php echo $unUtilisateur["nom"]; ?></td>
                <td style="border-style: solid"><?php echo $unUtilisateur["prenom"]; ?></td>
                <td style="border-style: solid"><?php echo $unUtilisateur["mailCompte"]; ?></td>
                <td style="border-style: solid"><?php echo $unUtilisateur["dateNaissance"]; ?></td>
                <td style="border-style: solid"><?php echo $unUtilisateur["genre"]; ?></td>
                <td style="border-style: solid"><?php echo $unUtilisateur["numTel"]; ?></td>
            </tr>
            <?php
        };
        ?>

        </tbody>
    </table>
</div>
