
<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelCompte.php';

class ControllerCompte {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerCompte : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des comptes
    public static function compteReadAll() {
        $results = ModelCompte::getAllComptePersonnePays();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAll.php';
        if (DEBUG)
            echo ("ControllerCompte : compteReadAll : vue = $vue");
        require ($vue);
    }

    public static function compteSelectForTransfert()
    {
        $results = ModelCompte::getAllComptePersonne(1001);
        include "config.php";
        $vue = $root . '/app/view/compte/viewSelectForTransfert.php';
        if (DEBUG)
            echo ("ControllerCompte : caveAccueil : vue = $vue");
        require ($vue);
    }

    public static function transfertInitie()
    {
        $results = ModelCompte::transferer(
            htmlspecialchars($_GET['compte_emetteur']),
            htmlspecialchars($_GET['compte_receveur']),
            htmlspecialchars($_GET['montant'])
        );

        include 'config.php';
        $vue = $root . '/app/view/compte/viewTransfered.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerCompte -->
