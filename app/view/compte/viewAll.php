<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenuBoss.html';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">client_nom</th>
            <th scope="col">client_prenom</th>
            <th scope="col">banque_label</th>
            <th scope="col">banque_pays</th>
            <th scope="col">compte_label</th>
            <th scope="col">compte_montant</th>
        </tr>
        </thead>
        <tbody>
        <?php

        echo("<div class='mt-2 mb-2 p-2'>");
        echo("<h2 style='color: red; text-align: center'>Liste des comptes</h2>");
        echo("</div>");


        $cols = $results[0];
        $datas = $results[1];

        // La liste des vins est dans une variable $results
        foreach ($results as $element) {
            printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%.2f</td></tr>",
                htmlspecialchars($element["nom"]),
                htmlspecialchars($element["prenom"]),
                htmlspecialchars($element[2]),
                htmlspecialchars($element["pays"]),
                htmlspecialchars($element["label"]),
                $element["montant"]
            );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewAll -->