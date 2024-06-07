<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">label</th>
            <th scope="col">montant</th>
            <th scope="col">banque_id</th>
            <th scope="col">personne_id</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo("<div class='mt-2 mb-2 p-2'>");
        echo("<h2 style='color: red; text-align: center'>Liste des comptes de cette banque</h2>");
        echo("</div>");
        // La liste des vins est dans une variable $results
        foreach ($results as $element) {
            printf(
                "<tr><td>%d</td><td>%s</td><td>%.2f</td><td>%d</td><td>%d</td></tr>",
                $element->getId(),
                $element->getLabel(),
                $element->getMontant(),
                $element->getBanqueId(),
                $element->getPersonneId()
            );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewAll -->