<!-- ----- début viewChoix -->

<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuClient.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <?php
            echo("<div class='mt-2 mb-2 p-2'>");
            echo("<h2 style='color: red; text-align: center'>Sélection d'une résidence pour un achat</h2>");
            echo("</div>");
            ?>

            <input type="hidden" name='action' value='residenceTobuy'>

            <label class='w-25' for="id">Sélectionnez une résidence: </label> <br>
            <select name="residence_id" id="id">
                <?php
                foreach ($results as $residence) {
                    echo("<option value=\"" . htmlspecialchars($residence->getId()) . "\>" . htmlspecialchars($residence->getLabel())  . "</option>");
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

<!-- ----- fin view Choix -->