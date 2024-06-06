
<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerAdministrateur {
    // --- page d'acceuil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerVin : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des administrateurs
    public static function administrateurReadAll() {
        $results = ModelAdministrateur::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : administrateurReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function administrateurReadId($args) {
        $results = ModelAdministrateur::getAllId();

        $target = $args['target'];

        if (DEBUG) {
            echo ("ControlleurVin:administrateurReadId : target = $target</br>");
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewId.php';
        require ($vue);
    }

    // Affiche un administrateur particulier (id)
    public static function administrateurReadOne() {
        $administrateur_id = $_GET['id'];
        $results = ModelAdministrateur::getOne($administrateur_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'un administrateur
    public static function administrateurCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau administrateur.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function administrateurCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelAdministrateur::insert(
            htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewInserted.php';
        require ($vue);
    }

    // Fonction supp ?

    // --- Liste des administrateurs
    public static function prodReadAllRegion() {
        $results = ModelAdministrateur::getAllRegion();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllProdRegion.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : prodReadAllRegion : vue = $vue");
        require ($vue);
    }

    public static function prodReadAllRegionProd() {
        $results = ModelAdministrateur::getAllRegionProd();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllProdRegionProd.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : prodReadAllRegionProd : vue = $vue");
        require ($vue);
    }

    public static function administrateurDelete() {
        $administrateur_id = $_GET['id'];
        $results = ModelAdministrateur::delete($administrateur_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewDelete.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : administrateurReadAll : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerAdministrateur -->
