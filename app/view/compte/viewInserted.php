
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuClient.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
        echo ("<h3>Vous avez un nouveau compte. </h3>");
        echo("<ul>");
        echo ("<li>label :" . $_GET['label'] . "</li>");
        echo ("<li>montant : " . $_GET['montant'] . "</li>");
        echo ("<li> Banque : " . $results. "</li>");
        echo("</ul>");
    } else {
        echo ("<h3>Problème de création du compte</h3>");

    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->


