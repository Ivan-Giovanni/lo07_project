<?php
?>


<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router2.php?action=CaveAccueil">LO07 PROJET</a>
        <a class="navbar-brand" href="router2.php?action=CaveAccueil"> | </a>
        <a class="navbar-brand" href="router2.php?action=CaveAccueil"> <?php
            foreach ($results as $element) {
                printf($element["nom"]);
            }
            ?> </a>
        <a class="navbar-brand" href="router2.php?action=CaveAccueil"> | </a>
        <a class="navbar-brand" href="router2.php?action=CaveAccueil"> <?php
            foreach ($results as $element) {
                printf($element["prenom"]);
            }
            ?> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">MES COMPTES BANCAIRES</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router2.php?action=?????">Liste de mes comptes</a></li>
                        <li><a class="dropdown-item" href="router2.php?action=?????">Ajouter un nouveau compte</a></li>
                        <li><a class="dropdown-item" href="router2.php?action=compteSelectForTransfert">Transfert inter-comptes</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">MES RESIDENCES</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router2.php?action=?????">Liste de mes résidences</a></li>
                        <li><a class="dropdown-item" href="router2.php?action=?????">Achat d'une nouvelle résidence</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">MON PATRIMOINE</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router2.php?action=patrimoineReadAll">Bilan de mon patrimoine</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">INNOVATIONS</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router2.php?action=?????">?</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">SE CONNECTER</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router2.php?action=clientLogin">Login</a></li>
                        <li><a class="dropdown-item" href="?">S'inscrire</a></li>
                        <li><a class="dropdown-item" href="router2.php?action=clientDeconnexion">Deconnexion</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- ----- fin fragmentCaveMenu -->


