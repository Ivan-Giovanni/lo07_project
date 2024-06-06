
<!-- ----- debut ControllerClient -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerClient {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerVin : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des clients
    public static function clientReadAll() {
        $results = ModelClient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewAll.php';
        if (DEBUG)
            echo ("ControllerClient : clientReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function clientReadId($args) {
        $results = ModelClient::getAllId();

        $target = $args['target'];

        if (DEBUG) {
            echo ("ControlleurVin:clientReadId : target = $target</br>");
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewId.php';
        require ($vue);
    }

    // Affiche un client particulier (id)
    public static function clientReadOne() {
        $client_id = $_GET['id'];
        $results = ModelClient::getOne($client_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'un client
    public static function clientCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau client.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function clientCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelClient::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewInserted.php';
        require ($vue);
    }

    // Fonction supp ?

    // --- Liste des clients
    public static function prodReadAllRegion() {
        $results = ModelClient::getAllRegion();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewAllProdRegion.php';
        if (DEBUG)
            echo ("ControllerClient : prodReadAllRegion : vue = $vue");
        require ($vue);
    }

    public static function prodReadAllRegionProd() {
        $results = ModelClient::getAllRegionProd();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewAllProdRegionProd.php';
        if (DEBUG)
            echo ("ControllerClient : prodReadAllRegionProd : vue = $vue");
        require ($vue);
    }

    public static function clientDelete() {
        $client_id = $_GET['id'];
        $results = ModelClient::delete($client_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewDelete.php';
        if (DEBUG)
            echo ("ControllerClient : clientReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerClient -->
