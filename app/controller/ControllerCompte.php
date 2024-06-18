
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

    // -- Ajout d'un compte

    public static function compteCreate() {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInsert.php';
        require ($vue);
    }

    //Transfert d'argent
    public static function compteTransfer() {
        $client_id = BEATRICEID;
        // compter le nombre de comptes
        $nbre_compte = ModelCompte::count($client_id);
        // condition
        if ($nbre_compte < 2) {
            echo ("Vous n'avez pas assez de comptes pour effectuer cette opération");
        } else {
            // formulaire
            // ----- Construction chemin de la vue
            $results = ModelCompte::getMylabel($client_id);
            include 'config.php';
            $vue = $root . '/app/view/compte/viewTransfer.php';
            require ($vue);
        }
    }

    public static function compteTransfered() {
        // - montant pour debit_id
        // + montant pour credit_id
        // ajouter une validation des informations du formulaire
        $results = ModelCompte::transfer(
            htmlspecialchars($_GET['debit_id']),
            htmlspecialchars($_GET['credit_id']),
            htmlspecialchars($_GET['montant'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewTransfered.php';
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
