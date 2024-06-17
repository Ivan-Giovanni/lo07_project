
<!-- ----- début viewInsert -->

<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuClient.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='compteCreated'>
            <label class='w-25' for="id">Label : </label> <br>
            <input type="text" name='label' size='75' value='Livret B'> <br/><br/><br/>
            <label class='w-25' for="id">Montant: </label> <br>
            <input type="number" name='montant' size='75' value='10000'><br/> <br>
            <label class='w-25' for="id"> Banque: </label> <br>
            <select name="banque_id" id="label">
                <?php
                foreach ($results as $banque) {
                    echo("<option value=\"" . htmlspecialchars($banque->getId()) . "\">" . htmlspecialchars($banque->getLabel()) . "</option>");
                }
                ?>
            </select>

        </div>
        <p/>
        <br/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



