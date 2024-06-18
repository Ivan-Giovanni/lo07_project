<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');

// Check if user information is available in the session
if (isset($_SESSION['user_info'])) {
    $user_info = $_SESSION['user_info'];

    // Access user information like:
    $nom = $user_info['nom'];
    $prenom = $user_info['prenom'];
    $id = $user_info['id'];
    $statut = $user_info['statut'];
    $login = $user_info['login'];
    $password = $user_info['password'];

} else {
    echo ("user_info not found");
}

?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenuClient.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Nom du compte</th>
            <th scope="col">Montant</th>
            <th scope="col">Nom de la banque</th>
            <th scope="col">Pays</th>

        </tr>
        </thead>
        <tbody>
        <?php

        echo("<div class='mt-2 mb-2 p-2'>");
        echo("<h2 style='color: red; text-align: center'>Liste des comptes</h2>");
        echo("</div>");


        // La liste des comptes est dans une variable $results
        foreach ($results as $element) {
            printf(
                "<tr><td>%s</td><td>%.2f</td><td>%s</td><td>%s</td></tr>",
                htmlspecialchars($element["label_compte"]),
                htmlspecialchars($element["montant"]),
                htmlspecialchars($element["label_banque"]),
                htmlspecialchars($element["pays"])
            );
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewAll -->