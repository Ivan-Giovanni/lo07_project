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
            <th scope="col">nom</th>
            <th scope="col">prenom</th>
            <th scope="col">login</th>
            <th scope="col">password</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo("<div class='mt-2 mb-2 p-2'>");
        echo("<h2 style='color: red; text-align: center'>Liste des clients</h2>");
        echo("</div>");
        // La liste des vins est dans une variable $results
        foreach ($results as $element) {
            printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                $element->getNom(),
                $element->getPrenom(),
                $element->getLogin(),
                $element->getPassword()
            );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewAll -->