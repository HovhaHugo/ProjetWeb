<div class="panel">
    <h3  style="margin-left: 200px">Liste des appartements <?php
        if($location == true){
            echo "louer";
        }else{
            echo "acheter";
        }
        ?></h3>
    <?php
    if($appartement == null){
        echo("<p style='margin-left: 300px'>Pas d'appartement actuellement sous votre nom</p>");
        }else{?>
    <table  align="center" style="border-style: solid">
        <tbody>
        <tr style="border-style: solid" align="center">
            <td style="border-style: solid">NomAppartement</td>
            <td style="border-style: solid">NumeroRue</td>
            <td style="border-style: solid">NomRue</td>
            <td style="border-style: solid">NomVille</td>
        </tr>
        <?php
            foreach ($appartement as $unAppartement) {
                ?>
                <tr >
                    <td style="border-style: solid"><?php echo $unAppartement["libelleAppartement"]; ?></td>
                    <td style="border-style: solid"><?php echo $unAppartement["numMaison"]; ?></td>
                    <td style="border-style: solid"><?php echo $unAppartement["nomRue"]; ?></td>
                    <td style="border-style: solid"><?php echo $unAppartement["nomVille"]; ?></td>
                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>
</div>
