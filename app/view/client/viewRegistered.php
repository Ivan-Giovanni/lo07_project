
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenuDefault.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
        echo ("<h3>Inscription réussie ! </h3>");
        echo ("<br/>\n");
        echo ("<h4>Maintenant veuillez vous connecter</h4>");
    } else {
        echo ("<h3>Problème d'inscription</h3>");
    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    