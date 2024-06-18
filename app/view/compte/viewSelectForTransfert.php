<!-- ----- début viewInsert -->

<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuClient.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <?php
    echo("<div class='mt-2 mb-2 p-2'>");
    echo("<h2 style='color: red; text-align: center'>Transfert inter-comptes</h2>");
    echo("</div>");
    ?>

    <!-- Div pour afficher le message d'erreur -->
    <div id="error-message" class="alert alert-danger" role="alert" style="display: none;">
        Impossible de transférer, les comptes sont identiques.
    </div>

    <form id="transfertForm" role="form" method='get' action='router2.php' onsubmit="return validateForm()">
        <div class="form-group">
            <input type="hidden" name='action' value='transfertInitie'>

            <label class='w-25' for="id">Selectionner le compte émetteur : </label>
            <select name="compte_emetteur" id="compte_emetteur">
                <?php
                foreach ($results as $compte) {
                    echo("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                }
                ?>
            </select>
            <br>
            <br>

            <label class='w-25' for="id">Selectionner le compte receveur : </label>
            <select name="compte_receveur" id="compte_receveur">
                <?php
                foreach ($results as $compte) {
                    echo("<option value=" . $compte->getId() . ">" . $compte->getLabel() . "</option>");
                }
                ?>
            </select>
            <br>
            <br>

            <label class='w-25' for="montant">Montant : </label>
            <input type="number" step='10' name='montant' value='0' min='0'>
            <br/>
        </div>
        <p/>
        <br/>
        <button class="btn btn-primary" type="submit">Transferer</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<script>
    function validateForm() {
        var emetteur = document.getElementById("compte_emetteur").value;
        var receveur = document.getElementById("compte_receveur").value;
        var errorMessage = document.getElementById("error-message");

        if (emetteur === receveur) {
            errorMessage.style.display = "block";
            return false; // Empêche la soumission du formulaire
        } else {
            errorMessage.style.display = "none";
            return true; // Permet la soumission du formulaire
        }
    }
</script>

<!-- ----- fin viewInsert -->
