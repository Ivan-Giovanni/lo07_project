
<!-- ----- début viewTransfer -->

<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuClient.html';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='compteTransfered'>
            <label class='w-25' for="id"> Compte à débiter : </label> <br>
            <select name="debit_id" id="label">
                <?php
                foreach ($results as $compte) {
                    echo("<option value=\"" . htmlspecialchars($compte->getId()) . "\">" . htmlspecialchars($compte->getLabel()) . "</option>");
                }
                ?>
            </select><br><br>
            <label class='w-25' for="id"> Compte à créditer: </label> <br>
            <select name="credit_id" id="label">
                <?php
                foreach ($results as $compte) {
                    echo("<option value=\"" . htmlspecialchars($compte->getId()) . "\">" . htmlspecialchars($compte->getLabel()) . "</option>");
                }
                ?>
            </select><br><br>
            <label class='w-25' for="id"> Montant: </label> <br>
            <input type="number" name='montant' size='75' value='10000'><br/>

        </div>
        <p/>
        <br/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewTransfer -->



