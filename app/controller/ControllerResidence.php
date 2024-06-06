
<!-- ----- debut ControllerResidence -->
<?php
require_once '../model/ModelResidence.php';

class ControllerResidence {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerVin : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des residences
    public static function residenceReadAll() {
        $results = ModelResidence::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAll.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function residenceReadId($args) {
        $results = ModelResidence::getAllId();

        $target = $args['target'];

        if (DEBUG) {
            echo ("ControlleurVin:residenceReadId : target = $target</br>");
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewId.php';
        require ($vue);
    }

    // Affiche un residence particulier (id)
    public static function residenceReadOne() {
        $residence_id = $_GET['id'];
        $results = ModelResidence::getOne($residence_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'un residence
    public static function residenceCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau residence.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function residenceCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelResidence::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewInserted.php';
        require ($vue);
    }

    // Fonction supp ?

    // --- Liste des residences
    public static function prodReadAllRegion() {
        $results = ModelResidence::getAllRegion();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAllProdRegion.php';
        if (DEBUG)
            echo ("ControllerResidence : prodReadAllRegion : vue = $vue");
        require ($vue);
    }

    public static function prodReadAllRegionProd() {
        $results = ModelResidence::getAllRegionProd();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAllProdRegionProd.php';
        if (DEBUG)
            echo ("ControllerResidence : prodReadAllRegionProd : vue = $vue");
        require ($vue);
    }

    public static function residenceDelete() {
        $residence_id = $_GET['id'];
        $results = ModelResidence::delete($residence_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewDelete.php';
        if (DEBUG)
            echo ("ControllerResidence : residenceReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerResidence -->
