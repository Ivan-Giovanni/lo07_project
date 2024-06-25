<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenuDefault.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <?php
    echo("<div class='mt-2 mb-2 p-2'>");
    echo("<h2 style='color: red; text-align: center'>Connectez-vous</h2>");
    echo("</div>");
    ?>

    <div class="card-body bg-primary">
        <div class='mx-lg-3'>

            <br>

            <form role="form" method='get' action='router2.php'>
                <div class="form-group">
                    <input type="hidden" name='action' value='clientLoggedIn'>

                    <label for="login" class="form-label"><b>Login</b></label>
                    <input type="text" class="form-control" id="login" name="login" required><br/>

                    <label for="password" class="form-label"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <p/>
                <br/>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
            <p/>
            <br/>

        </div>
    </div>

</div>

</div>
<?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewAll -->