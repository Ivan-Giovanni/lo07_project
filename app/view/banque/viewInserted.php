
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
        echo ("<h3>La nouvelle banque a été ajoutée </h3>");
        echo("<ul>");
        echo ("<li>id = " . $results . "</li>");
        echo ("<li>label = " . $_GET['label'] . "</li>");
        echo ("<li>pays = " . $_GET['pays'] . "</li>");
        echo("</ul>");
    } else {
        echo ("<h3>Problème d'insertion de la banque</h3>");
        echo ("id = " . $_GET['label']);
    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    