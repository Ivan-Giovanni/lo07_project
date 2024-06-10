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
            <input type="hidden" name='action' value='banqueCreated'>

            <label class='w-25' for="id">Label : </label>
            <input type="text" name='label' size='75' value='UBA'> <br/><br/><br/>
            <label class='w-25' for="id">Pays : </label>
            <input type="text" name='pays' size='75' value='Nigeria'><br/>
        </div>
        <p/>
        <br/>
        <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



