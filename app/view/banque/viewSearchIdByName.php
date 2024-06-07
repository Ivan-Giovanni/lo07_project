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

            <div class='mt-2 mb-2 p-2'>
                <h2 style='color: red; text-align: center'>Sélectionnez une banque de cette liste</h2>
            </div>

            <select name="label" id="label">
                <?php
                foreach ($results as $banque) {
                    echo("<option value=\"" . htmlspecialchars($banque->getLabel()) . "\">" . htmlspecialchars($banque->getLabel()) . "</option>");
                }
                ?>
            </select>
        </div>
        <p/>
        <br/>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->

