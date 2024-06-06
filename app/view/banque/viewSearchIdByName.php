<!-- ----- début viewInsert -->

<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">
            <input type="hidden" name='action' value='banqueIdFound'>

            <label class='w-25' for="id">Selectionnez la banque : </label>
            <select name="label" id="label">
                <?php
                foreach ($results as $banque) {
                    echo("<option value=\"" . htmlspecialchars($banque->getLabel()) . "\">" . htmlspecialchars($banque->getId()) . " : " . htmlspecialchars($banque->getLabel()) . " : " . htmlspecialchars($banque->getPays()) . "</option>");
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

