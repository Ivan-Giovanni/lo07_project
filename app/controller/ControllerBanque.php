
<!-- ----- debut ControllerBanque -->
<?php
require_once '../model/ModelBanque.php';

class ControllerBanque {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerBanque : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des banques
    public static function banqueReadAll() {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAll.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function banqueReadId($args) {
        $results = ModelBanque::getAllId();

        $target = $args['target'];

        if (DEBUG) {
            echo ("ControlleurVin:banqueReadId : target = $target</br>");
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewId.php';
        require ($vue);
    }

    // Affiche un banque particulier (id)
    public static function banqueReadOne() {
        $banque_id = $_GET['id'];
        $results = ModelBanque::getOne($banque_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'un banque
    public static function banqueCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau banque.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function banqueCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelBanque::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInserted.php';
        require ($vue);
    }

    // Fonction supp ?

    // --- Liste des banques
    public static function prodReadAllRegion() {
        $results = ModelBanque::getAllRegion();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAllProdRegion.php';
        if (DEBUG)
            echo ("ControllerBanque : prodReadAllRegion : vue = $vue");
        require ($vue);
    }

    public static function prodReadAllRegionProd() {
        $results = ModelBanque::getAllRegionProd();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAllProdRegionProd.php';
        if (DEBUG)
            echo ("ControllerBanque : prodReadAllRegionProd : vue = $vue");
        require ($vue);
    }

    public static function banqueDelete() {
        $banque_id = $_GET['id'];
        $results = ModelBanque::delete($banque_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewDelete.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerBanque -->
<?php
