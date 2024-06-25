<!-- ----- debut viewAllMy -->
<?php

require($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenuClient.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Label</th>
            <th scope="col">Ville</th>
            <th scope="col">Prix</th>


        </tr>
        </thead>
        <tbody>
        <?php

        echo("<div class='mt-2 mb-2 p-2'>");
        echo("<h2 style='color: red; text-align: center'>Liste de mes residences</h2>");
        echo("</div>");


        // La liste des residences est dans une variable $results

        foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%s</td><td>%.2f</td></tr>",
                $element->getLabel(), $element->getVille(), $element->getPrix());
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewAllMy -->