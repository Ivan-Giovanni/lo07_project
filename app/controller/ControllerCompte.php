
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
        $results = ModelCompte::getAllComptePersonne($_SESSION['user_info']['id']);
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

    // --- Liste des comptes d'un client
    public static function compteReadMyCompte() {
        $client_id = $_SESSION['user_info']['id'];
        $results = ModelCompte::getAllMyCompte($client_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAllMy.php';
        if (DEBUG)
            echo ("ControllerCompte : compteReadAll : vue = $vue");
        require ($vue);
    }

    // -- Ajout d'un compte

    public static function compteCreate() {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInsert.php';
        require ($vue);
    }

    public static function compteCreated() {
        $client_id = $_SESSION['user_info']['id'];
        // ajouter une validation des informations du formulaire
        $results = ModelCompte::insert(
            htmlspecialchars($_GET['label']),
            htmlspecialchars($_GET['montant']),
            htmlspecialchars($_GET['banque_id']),
            htmlspecialchars($client_id)
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInserted.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerCompte -->
