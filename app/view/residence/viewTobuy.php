
<!-- ----- début viewtobuy -->

<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenuClient.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <?php
            echo("<div class='mt-2 mb-2 p-2'>");
            echo("<h2 style='color: red; text-align: center'> Achat de la résidence </h2>");
            echo("</div>");
            ?>

            <input type="hidden" name='action' value='residenceBought'>
            <input type ="hidden" name="residence_id" value="<?php echo ($residence_id); ?>">
            <input type ="hidden" name="personne_id" value="<?php $personne_id ?>">


            <label class='w-25' for="id">Sélectionnez un compte de l'acheteur </label> <br>
            <select name="acheteur_id" id="label">
                <?php
                foreach ($label_acheteur as $compte) {
                    echo("<option value=\"" . htmlspecialchars($compte->getId()) . "\">" . htmlspecialchars($compte->getLabel()) . "</option>");
                }
                ?>
            </select>
            <br>

            <label class='w-25' for="id">Sélectionnez un compte du vendeur: </label> <br>
            <select name="vendeur_id" id="label">
                <?php
                foreach ($label_vendeur as $compte) {
                    echo("<option value=\"" . htmlspecialchars($compte->getId()) . "\">" . htmlspecialchars($compte->getLabel()) . "</option>");
                }

                ?>
            </select>
            <br>
            <label class='w-25' for="id"> Prix: </label> <br>
            <input type="text" name='prix' value="<?php echo($prix); ?>"  readonly>

        </div>
        <p/>
        <br/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewtobuy -->



