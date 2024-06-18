
<!-- ----- début viewBought -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuClient.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results == -1) {
        echo ("<br> <h4>  Impossible d'effectuer ce transfert:les comptes sélectionnés sont identiques <h4> <br>");
    }elseif ($results == 1) {
        echo ("<h3> Votre achat a été validé. </h3>");
        //echo("<ul>");
        //echo ("<li>:" . $_GET['label'] . "</li>");
        //echo ("<li>montant : " . $_GET['montant'] . "</li>");
        //echo ("<li> Banque : " . $results. "</li>");
        //echo("</ul>");
    } else {
        echo ("<h3>Problème de Transfert </h3>");

    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewBought -->